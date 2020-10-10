
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
        await drawTable(contratos, $body, 'Contrato');
        if (document.getElementById('infoTable') != null) {
            document.getElementById('infoTable').remove()
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
        refresh(res.data)
        // $('#formContratoRegister').trigger("reset");
        // $('#modalContratoRegister').modal('hide');
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
                    console.log(success);
                    refresh(success.data)
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
            // formContratoUpdate.id.value = modelEdit.data.data.id;
            // formContratoUpdate.nombre.value = modelEdit.data.data.nombre;
            // formContratoUpdate.apellido.value = modelEdit.data.data.apellido;
            // formContratoUpdate.email.value = modelEdit.data.data.email;
            // formContratoUpdate.tipo_identificacion.value = modelEdit.data.data.tipo_identificacion;
            // formContratoUpdate.identificacion.value = modelEdit.data.data.identificacion;
            // formContratoUpdate.direccion.value = modelEdit.data.data.direccion;
            // formContratoUpdate.ciudad.value = modelEdit.data.data.ciudad;
            // formContratoUpdate.departamento.value = modelEdit.data.data.departamento;
            // formContratoUpdate.barrio.value = modelEdit.data.data.barrio;
            // formContratoUpdate.telefono.value = modelEdit.data.data.telefono;
            // formContratoUpdate.opcional_telefono.value = modelEdit.data.data.opcional_telefono
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
