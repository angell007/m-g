// **************************************************************************************
const btnSearch = document.getElementById('btnSearch')
const filtrarContrato = document.getElementById('filtrarContrato')
const identificacion = document.getElementById('identificacion')
const selectContrato = document.getElementById('selectContrato');
const blockFilter = document.getElementById('blockFilter');
let descuentos = 0
let setComision = 0

// **************************************************************************************
const min = document.getElementById('min');
const max = document.getElementById('max');
const selectContratoVal = document.getElementById('selectContratoVal');
// **************************************************************************************

formRegisterPagoRealizado = document.getElementById('formRegisterPagoRealizado')
formRegisterPagoRealizado.addEventListener('submit', async (event) => {
    event.preventDefault();

    if (document.getElementById('min').value != '' && document.getElementById('max').value != '') {
        const bodyData = new FormData()
        Array.from(formRegisterPagoRealizado.elements).forEach((element) => {
            let campo = element.value.toString()
            const regex = /[\$,]/gi;
            if (element.name != 'observaciones') {
                bodyData.append(element.name, campo.replace(regex, ''))
            }
            if (element.name == 'observaciones') {
                bodyData.append(element.name, campo)
            }
        })

        bodyData.append('desde', document.getElementById('min').value)
        bodyData.append('hasta', document.getElementById('max').value)

        const setDataRealizado = await axios.post(formRegisterPagoRealizado.action, bodyData)
        if (setDataRealizado.data.code == 200) {
            formRegisterPagoRealizado.reset()
            toastr.info('Pago registrado correctamente')
            document.getElementById('idToPrint').value = setDataRealizado.data.data.id
            document.getElementById('btnPrint').style.display = 'block'
        }
    } else {
        toastr.error('Debe Seleccionar fechas de corte')
        return false;
    }

})


const printf = async (id) => {
    const printing = await axios.post('/print/realizado', { id: id },
        { responseType: 'blob' }, // important
    ).then((response) => {
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', response.headers["content-disposition"].split("filename=")[1]);
        document.body.appendChild(link);
        link.click();
    });
}

const drawTickest = async (data) => {
    htmlTickes = ''
    data.forEach((element) => {
        if (element['pago_realizados'] != undefined && element['pago_realizados'] != null) {
            element['pago_realizados'].forEach((p) => {

                htmlTickes += ` 
                          <div class="card p-2">
                                <label class="label-control" for=""> Fecha ${p.fecha} Contrato ${element.codigo} </label>                            
                                <label class="label-control" for="">Total Cancelado  ${p.valor} </label>
                                
                                <button type="button" class="btn btn-outline-info btn-sm"
                                value="Imprimir Recibo" onclick=printf("${p.id}")>Imprimir Recibo</button>
                          </div>
            
                `

            })
        }
    })

    document.getElementById('drawTickest').innerHTML = await htmlTickes;
}




const calcular = async () => {

    let otros = document.getElementById('otros')
    let canon = document.getElementById('canon')
    let administracion = document.getElementById('administracion')

    //*************************************************************************************

    let descuentos = document.getElementById('descuentos')
    let comision = document.getElementById('comision')
    let iva = document.getElementById('iva')

    //*************************************************************************************

    let totalDebitos = document.getElementById('totalDebitos')
    let totalCreditos = document.getElementById('totalCreditos')
    let valor = document.getElementById('valor')

    otros.value = currency(otros.value).format();
    canon.value = currency(canon.value).format();
    administracion.value = currency(administracion.value).format();

    descuentos.value = currency(descuentos.value).format();
    comision.value = currency(canon.value).multiply(setComision).divide(100).format();
    iva.value = currency(comision.value).multiply(19).divide(100).format();

    totalDebitos.value = currency(otros.value).add(canon.value).add(administracion.value).format();
    totalCreditos.value = currency(descuentos.value).add(comision.value).add(iva.value).format();
    valor.value = currency(totalDebitos.value).subtract(totalCreditos.value).format();

}


btnSearch.addEventListener('click', async (event) => {
    const urlContratos = '/' + SITEURL + '/propietarios/search'
    const reqPropietario = await axios.post(urlContratos, { identificacion: identificacion.value })
    switch (reqPropietario.status) {
        case 200:

            if (reqPropietario.data.data != null) {

                console.log(reqPropietario.data);

                blockFilter.style.display = "block";
                let htmlSelect = '';
                reqPropietario['data']['data']['contratos'].forEach(element => {
                    htmlSelect += `<option value="${element.id}">${element.codigo}</option>`
                });
                selectContratoVal.innerHTML = htmlSelect
                drawTickest(reqPropietario['data']['data']['contratos'])
            } else {
                alert('Propietario No encontrado ')
            }
            break;
        default:
            break;
    }
})


btngetData.addEventListener('click', async () => {
    const data = new FormData();
    data.append('min', min.value)
    data.append('max', max.value)
    data.append('codigo', selectContratoVal.value)
    const urlContratos = '/' + SITEURL + '/contrato/myg/getInfo'
    const getDataContrato = await axios.post(urlContratos, data)

    if (getDataContrato.data.data.descuentos.length > 0) {
        getDataContrato.data.data.descuentos.forEach((element) => {
            descuentos += parseFloat(element.valor);
        })
    }

    setComision = getDataContrato.data.data.inmueble.comision

    htmlForm = ` <div class="table-responsive">
    <table class="table">
        <thead class="text-center">
            <tr>
                <th>Cuenta</th>
                <th>Debitos</th>
                <th>Creditos</th>
            </tr>
        </thead>
        <tbody>
            <tr class="">
                <td>Canon de Arriendo</td>
                <td>
                    <input class="form-control form-control-sm" autocomplete="off" onchange="calcular()" name="canon" id="canon" value="${currency(getDataContrato.data.data.inmueble.canon).format()}">
                </td>
                <td></td>
            </tr>

            <tr class="">
                <td>Administracion</td>
                <td>
                    <input class="form-control form-control-sm" autocomplete="off" onchange="calcular()" name="administracion" id="administracion" value="${currency(getDataContrato.data.data.inmueble.administracion).format()}">
                </td>
                <td></td>
            </tr>

            <tr class="">
                <td>Otros</td>
                <td>
                    <input class="form-control form-control-sm" autocomplete="off" onchange="calcular()" name="otros" id="otros" value="${currency().format()}">
                </td>
                <td></td>
            </tr>

            <tr class="">
                <td>Descuentos </td>
                <td></td>
                <td>
                    <input class="form-control form-control-sm" autocomplete="off" onchange="calcular()" name="descuentos" id="descuentos" value="${currency(descuentos).format()}">
                </td>
            </tr>

            <tr class="">
                <td>Comision</td>
                <td></td>
                <td>
                    <input class="form-control form-control-sm" autocomplete="off" onchange="calcular()" name="comision" id="comision" value="">
                </td>
            </tr>

            <tr class="">
                <td>Iva</td>
                <td></td>
                <td>
                    <input class="form-control form-control-sm" autocomplete="off" onchange="calcular()" name="iva" id="iva" value="19">
                </td>
            </tr>

            <tr class="">
                <td>Sub Total</td>
                <td>
                    <input class="form-control form-control-sm" name="totalDebitos" readOnly autocomplete="off" onchange="calcular()"
                        id="totalDebitos">
                </td>
                <td>
                    <input class="form-control form-control-sm" name="totalCreditos" readOnly autocomplete="off" onchange="calcular()"
                        id="totalCreditos">
                </td>
            </tr>

            <tr class="">
                <td>A pagar</td>
                <td colspan="2">
                    <input class="form-control form-control-sm" readOnly autocomplete="off" onchange="calcular()" name="valor" id="valor">
                </td>

            </tr>

        </tbody>
    </table>
</div>


        <input type="hidden" name="codigo" value="${getDataContrato.data.data.codigo}">

        
    <div class="form-group col-md-4">
    <label for="">Fecha de Pago</label>
        <input type="date" class="form-control" name="fecha" required>
    </div>

    <div class="form-group col-md-12">
    <label for="">Observacion</label>
        <textarea name="observaciones" id="" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group col-md-12">
        <input type="submit" class="btn btn-outline-info  btn-sm " id="btnSearch" value="Enviar">
    </div>
`

    document.getElementById('formRegisterPagoRealizado').innerHTML = await htmlForm;
    calcular()
})

