// **************************************************************************************
const btnSearch = document.getElementById('btnSearch')
const filtrarContrato = document.getElementById('filtrarContrato')
const identificacion = document.getElementById('identificacion')
const selectContrato = document.getElementById('selectContrato');
const blockFilter = document.getElementById('blockFilter');

// **************************************************************************************
const selectContratoVal = document.getElementById('selectContratoVal');
// **************************************************************************************

formRegisterDescuento = document.getElementById('formRegisterDescuento')
formRegisterDescuento.addEventListener('submit', async (event) => {
    event.preventDefault();

    const bodyData = new FormData()
    Array.from(formRegisterDescuento.elements).forEach((element) => {
        let campo = element.value.toString()
        const regex = /[\$,]/gi;
        if (element.name != 'observaciones') {
            bodyData.append(element.name, campo.replace(regex, ''))
        }
        if (element.name == 'observaciones') {
            bodyData.append(element.name, campo)
        }
    })
    const setDataRealizado = await axios.post(formRegisterDescuento.action, bodyData)
    if (setDataRealizado.data.code == 200) {
        formRegisterDescuento.reset()
        toastr.info('Pago registrado correctamente')
        drawDescuentosHistory()
    }
})

btnSearch.addEventListener('click', async (event) => {
    const urlContratos = '/' + SITEURL + '/propietarios/search'
    const reqPropietario = await axios.post(urlContratos, { identificacion: identificacion.value })
    switch (reqPropietario.status) {
        case 200:

            if (reqPropietario.data.data != null) {
                blockFilter.style.display = "block";
                let htmlSelect = '';
                reqPropietario['data']['data']['contratos'].forEach(element => {
                    htmlSelect += `<option value="${element.id}">${element.codigo}</option>`
                });
                selectContratoVal.innerHTML = htmlSelect
            } else {
                alert('Propietario No encontrado ')
            }


            break;
        default:
            break;
    }
})


const descuentosHistory = document.getElementById('descuentosDraw');

btngetData.addEventListener('click', async () => {
    drawDescuentosHistory()
})

const drawDescuentosHistory = async () => {

    const getDataContrato = await axios.get(`/${SITEURL}/descuentos/myg/details/${selectContratoVal.value}`)

    htmlForm = ` 

    <input type="hidden" name="contrato_id" value="${selectContratoVal.value}">

    <div class="form-group col-md-4">
    <label for="">Fecha</label>
        <input type="date" class="form-control" name="fecha" required>
    </div>

    <div class="form-group col-md-8">
    <label for="">Concepto</label>
        <input name="concepto" class="form-control" ></input>
    </div>

    <div class="form-group col-md-6">
    <label for="">Valor</label>
        <input name="valor" class="form-control" ></input>
    </div>

    <div class="form-group col-md-12">
    <label for="">Observacion</label>
        <textarea name="observaciones" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group col-md-12">
        <input type="submit" class="btn btn-outline-info  btn-sm " id="btnSearch" value="Enviar">
    </div>
`
    document.getElementById('formRegisterDescuento').innerHTML = await htmlForm;


    if (getDataContrato.data.data != null) {
        let history = '';
        getDataContrato.data.data.forEach((descuento) => {
                history += `
                <hr>
                <small class="text text-danger font-weight-bold ">${descuento.fecha} ${descuento.user.name} </small>
                <p class=" text text-black" style="font-size:1.3vw">Concepto: ${descuento.concepto} 
                <br>
                <span>${currency(descuento.valor).format()}</span>
                </p>
                <small class="text text-black">Observación: ${descuento.observaciones}</small>
              `
        })
        descuentosHistory.innerHTML = history
    }
}