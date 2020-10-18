// **************************************************************************************
const btnSearch = document.getElementById('btnSearch')
const filtrarContrato = document.getElementById('filtrarContrato')
const identificacion = document.getElementById('identificacion')
const selectContrato = document.getElementById('selectContrato');
const blockFilter = document.getElementById('blockFilter');
let descuentos = 0;

// **************************************************************************************
const min = document.getElementById('min');
const max = document.getElementById('max');
const selectContratoVal = document.getElementById('selectContratoVal');
// **************************************************************************************

formRegisterPagoRecibido = document.getElementById('formRegisterPagoRecibido')
formRegisterPagoRecibido.addEventListener('submit', async (event) => {
    event.preventDefault();

    const bodyData = new FormData()
    Array.from(formRegisterPagoRecibido.elements).forEach((element) => {
        let campo = element.value.toString()
        const regex = /[\$,]/gi;
        if (element.name != 'observaciones') {
            bodyData.append(element.name, campo.replace(regex, ''))
        }
        if (element.name == 'observaciones') {
            bodyData.append(element.name, campo)
        }
    })
    const setDataRecibido = await axios.post(formRegisterPagoRecibido.action, bodyData)
    if (setDataRecibido.data.code == 200) {
        formRegisterPagoRecibido.reset()
        toastr.info('Pago registrado correctamente')
    }
})


const calcular = async () => {

    let otros = document.getElementById('otros')
    let canon = document.getElementById('canon')
    let administracion = document.getElementById('administracion')

    //*************************************************************************************

    // let descuentos = document.getElementById('descuentos')
    // let comision = document.getElementById('comision')
    // let iva = document.getElementById('iva')

    //*************************************************************************************

    // let totalCreditos = document.getElementById('totalCreditos')
    // let totalCreditos = document.getElementById('totalCreditos')
    let valor = document.getElementById('valor')

    otros.value = currency(otros.value).format();
    canon.value = currency(canon.value).format();
    administracion.value = currency(administracion.value).format();

    // descuentos.value = currency(descuentos.value).format();
    // comision.value = currency(comision.value).format();
    // iva.value = currency(iva.value).format();

    // totalCreditos.value = currency(otros.value).add(canon.value).add(administracion.value).format();
    valor.value = currency(otros.value).add(canon.value).add(administracion.value).format();
    // totalCreditos.value = currency(descuentos.value).add(comision.value).add(iva.value).format();

}


btnSearch.addEventListener('click', async (event) => {
    const urlContratos = '/' + SITEURL + '/arrendatarios/search'
    const reqArrendatario = await axios.post(urlContratos, { identificacion: identificacion.value })
    switch (reqArrendatario.status) {
        case 200:

            if (reqArrendatario.data.data != null) {
                blockFilter.style.display = "block";
                let htmlSelect = '';
                reqArrendatario['data']['data']['contratos'].forEach(element => {
                    htmlSelect += `<option value="${element.id}">${element.codigo}</option>`
                });
                selectContratoVal.innerHTML = htmlSelect
            } else {
                alert('Arrendatario No encontrado ')
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


    // if (getDataContrato.data.data.descuentos != null) {
    //     getDataContrato.data.data.descuentos.forEach((descuentos) => {
    //         descuentos += parseFloat(valor);
    //     })
    // }

    htmlForm = ` <div class="table-responsive">
    <table class="table">
        <thead class="text-center">
            <tr>
                <th>Concepto</th>
                <th colspan="2">Creditos</th>
            </tr>
        </thead>
        <tbody>
            <tr class="">
                <td>Canon de Arriendo</td>
                <td></td>
                <td>
                    <input class="form-control form-control-sm" autocomplete="off" onchange="calcular()" name="canon" id="canon" value="${currency(getDataContrato.data.data.inmueble.canon).format()}">
                </td>
            </tr>

            <tr class="">
                <td>Administracion</td>
                <td></td>
                <td>
                    <input class="form-control form-control-sm" autocomplete="off" onchange="calcular()" name="administracion" id="administracion" value="0">
                </td>
            </tr>

            <tr class="">
                <td>Otros</td>
                <td></td>
                <td>
                    <input class="form-control form-control-sm" autocomplete="off" onchange="calcular()" name="otros" id="otros" value="${currency().format()}">
                </td>
            </tr>

            <tr class="">
                <td>A recibir</td>
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

    document.getElementById('formRegisterPagoRecibido').innerHTML = await htmlForm;
    calcular()
})

