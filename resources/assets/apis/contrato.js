
let contratos = [];
let $body = document.querySelector("#bodyTableContratos");
let btnSaveContrato = document.getElementById("btnSaveContrato");
let btnUpdateContrato = document.getElementById("btnUpdateContrato");

let formContratoRegister = document.getElementById('formContratoRegister');
formContratoRegister.addEventListener('submit', ajaxFormRegisterContrato);

let formContratoUpdate = document.getElementById('formContratoUpdate');
formContratoUpdate.addEventListener('submit', ajaxFormUpdateContrato);


const info = () => {
    if (contratos.length == 0) {
        const $tr = document.createElement("tr");
        let $cell = document.createElement("td");
        $cell.setAttribute('colspan', 7)
        $cell.setAttribute('id', 'infoTable')
        $cell.textContent = 'Sin datos'
        $tr.appendChild($cell);
        $body.appendChild($tr);
    }
}


const getData = async () => {
    try {
        const response = await axios.get(`${SITEURL}/contratos`);
        contratos = Object.values((await response).data)
        if (contratos.length > 0) {
            await drawTable(contratos, $body, 'Contrato');
            if (document.getElementById('infoTable') != null) {
                document.getElementById('infoTable').remove()
            }
        }
    } catch (error) {
        console.error(error);
    }
}


//Envio de datos ajax a crear 
async function ajaxFormRegisterContrato(event) {
    event.preventDefault();

    btnSaveContrato.value = "Enviando...";
    btnSaveContrato.disabled = true

    const bodyRegister = new FormData(formContratoRegister)
    console.log(formContratoRegister);

    const register = await axios.post(formContratoRegister.action, bodyRegister).then(res => {
        console.log(res);
        refresh(res.data.message)
        $('#formContratoRegister').trigger("reset");
        $('#modalContratoRegister').modal('hide');
    }).catch((error) => {
        if (error.response.data.errors) {
            for (var clave in error.response.data.errors) {
                let container = formContratoRegister.elements.namedItem(clave);
                container.classList.add('is-invalid');
                toastr.error(`<li> ${error.response.data.errors[clave]} </li>`);
            }
            console.error(error.response.data);
        }
    })
    document.getElementById("btnSaveContrato").value = "Enviar";
    btnSaveContrato.disabled = false
}

//Envio de datos ajax a actualizar
async function ajaxFormUpdateContrato(event) {
    event.preventDefault();

    btnUpdateContrato.value = "Enviando..."
    btnUpdateContrato.disabled = true

    const dataUpdate = new FormData(formContratoUpdate);
    const update = await axios.post(formContratoUpdate.action, dataUpdate).then(res => {
        refresh(res.data)
        console.log(res.data);
        $('#formContratoUpdate').trigger("reset");
        $('#modalContratoUpdate').modal('hide');

    }).catch((error) => {
        for (var clave in error.response.data.errors) {
            let container = formContratoUpdate.elements.namedItem(clave);
            container.classList.add('is-invalid');
            warning = document.createTextNode(`${(error.response.data.errors[clave])}`);
            insertAfter(warning, container);
        }
    })

    document.getElementById("btnUpdateContrato").value = "Enviar";
    btnUpdateContrato.disabled = false
}


// Eliminar Contrato
function eliminarContrato(ente_id) {
    toastr.options.preventDuplicates = true;
    toastr.info("<br /><button class='btn btn-sm btn-danger m-1' type='button' value='yes'>Yes</button> <button class='btn btn-sm btn-warning m-1' type ='button'  value='no' > No </button>", 'Desea eliminar este elemento ?', {
        allowHtml: true,
        onclick: async function (toast) {
            value = toast.target.value
            if (value == 'yes') {
                const url = `${SITEURL}/contratos/${ente_id}`
                try {
                    const success = await axios.delete(url);
                    refresh(success.data.data)
                } catch (error) {
                    toastr.remove()
                    console.error(error);
                }
            }
            else {
                toastr.remove()
            }
        }
    });
}


async function editarContrato(ente_id) {

    const url = SITEURL + '/contratos/' + ente_id
    const modelEdit = await axios.get(url)
    switch (modelEdit.status) {
        case 200:

            console.log(modelEdit);

            formContratoUpdate.id.value = modelEdit.data.data.id;
            formContratoUpdate.observaciones.value = modelEdit.data.data.observaciones;
            formContratoUpdate.fin.value = modelEdit.data.data.fin;
            formContratoUpdate.inicio.value = modelEdit.data.data.inicio;
            formContratoUpdate.inmueble_id.value = modelEdit.data.data.inmueble.codigo;
            formContratoUpdate.arrendatario_id.value = modelEdit.data.data.arrendatario.identificacion;

            document.getElementById('canon').value = currency(modelEdit.data.data.inmueble.canon).format()
            document.getElementById('administracion').value = currency(modelEdit.data.data.inmueble.administracion).format()



            $('#modalContratoUpdate').modal('show')
            break;
        default:
            break;
    }
}

const refresh = async (success) => {
    $body.innerHTML = "";
    getData()
    await toastr.remove()
    await toastr.info('Success:', success);
}

if (document.hasFocus()) {
    info()
    getData()
}


settCanon = async () => {
    try {
        let canon = document.querySelector('.canon')
        let administracion = document.querySelector('.administracion')
        let customID = document.getElementById('customID')
        const response = await axios.get(`${SITEURL}/search/${customID.value}`);

        canon.value = currency(response.data.data['canon']).format()
        administracion.value = currency(response.data.data['administracion']).format()

    } catch (error) {
        console.error(error);
    }
}
