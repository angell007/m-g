// **************************************************************************************
const btnSearch = document.getElementById('btnSearch')
const filtrarContrato = document.getElementById('filtrarContrato')
const identificacion = document.getElementById('identificacion')
const selectContrato = document.getElementById('selectContrato');
const blockFilter = document.getElementById('blockFilter');

// **************************************************************************************
const selectContratoVal = document.getElementById('selectContratoVal');
// **************************************************************************************

formRegisterPendiente = document.getElementById('formRegisterPendiente')
formRegisterPendiente.addEventListener('submit', async (event) => {
    event.preventDefault();

    const bodyData = new FormData()
    Array.from(formRegisterPendiente.elements).forEach((element) => {
        let campo = element.value.toString()
        const regex = /[\$,]/gi;
        if (element.name != 'observaciones') {
            bodyData.append(element.name, campo.replace(regex, ''))
        }
        if (element.name == 'observaciones') {
            bodyData.append(element.name, campo)
        }
    })
    const setDataRealizado = await axios.post(formRegisterPendiente.action, bodyData)
    if (setDataRealizado.data.code == 200) {
        formRegisterPendiente.reset()
        toastr.info('Pendiente registrado correctamente')
        drawPendientesHistory()
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

const actualizarPendiente = async (value) => {
    let estado = document.getElementById('estadoPendiente').value
    const updatePendiente = await axios.put(`/${SITEURL}/pendientes/update`, { 'id': value, 'estado': estado })
    drawPendientesHistory()
    toastr.info('Estado de pendiente actualizado')
}

const pendientesHistory = document.getElementById('pendientesDraw');

btngetData.addEventListener('click', async () => {
    drawPendientesHistory()
})

const drawPendientesHistory = async () => {

    const getDataContrato = await axios.get(`/${SITEURL}/pendientes/myg/details/${selectContratoVal.value}`)

    htmlForm = ` 

    <input type="hidden" name="contrato_id" value="${selectContratoVal.value}">

    <div class="form-group col-md-6">
    <label for="">Fecha</label>
        <input type="date" class="form-control form-control-sm" name="fecha" required>
    </div>

    <div class="form-group col-md-6">
    <label for="">Estado</label>
        <select class="form-control form-control-sm" name="estado">
        <option value="activa">Activa</option>
        <option value="inactiva">Inactiva</option>
        </select>
    </div>

    <div class="form-group col-md-12">
    <label for="">Tarea</label>
        <textarea name="body" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group col-md-12">
        <input type="submit" class="btn btn-outline-info  btn-sm " id="btnSearch" value="Enviar">
    </div>
`
    document.getElementById('formRegisterPendiente').innerHTML = await htmlForm;


    if (getDataContrato.data.data != null) {
        let history = '';
        getDataContrato.data.data.forEach((pendiente) => {
            history += `
                <hr>
                <small class="text text-danger font-weight-bold ">${pendiente.fecha} ${pendiente.user.name}
                        <select class="btn btn-sm btn-outline-info mx-auto" id="estadoPendiente">
                        <option value="activa" ${(pendiente.estado == 'activa') ? 'selected' : ''}>Activa</option>
                        <option value="inactiva" ${(pendiente.estado == 'inactiva') ? 'selected' : ''}>Inactiva</option>
                        </select>
                </small>
                <button class="btn btn-sm btn-outline-info mx-auto" onclick="actualizarPendiente(${pendiente.id})">Actualizar</button>
                <br>
                <small class="text text-black">Observación: ${pendiente.body}</small>
                `
        })
        // <span>${currency(pendiente.valor).format()}</span>
        // <p class=" text text-black" style="font-size:1.3vw">Concepto: ${pendiente.concepto} 
        pendientesHistory.innerHTML = history
    }
}