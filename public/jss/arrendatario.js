
let arrendatarios = [];
let $body = document.querySelector("#bodyTableArrendatarios");
let btnSaveArrendatario = document.getElementById("btnSaveArrendatario");
let btnUpdateArrendatario = document.getElementById("btnUpdateArrendatario");

let formArrendatarioRegister = document.getElementById('formArrendatarioRegister');
formArrendatarioRegister.addEventListener('submit', ajaxFormRegisterArrendatarios);

let formArrendatarioUpdate = document.getElementById('formArrendatarioUpdate');
formArrendatarioUpdate.addEventListener('submit', ajaxFormUpdateArrendatario);


const info = () => {
    if (arrendatarios.length == 0) {
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
        const response = await axios.get(`${SITEURL}/arrendatarios`);
        arrendatarios = Object.values((await response).data)
        if (arrendatarios.length > 0) {
            await drawTable(arrendatarios, $body, 'Arrendatario');
            if (document.getElementById('infoTable') != null) {
                document.getElementById('infoTable').remove()
            }
        }

    } catch (error) {
        console.error(error);
    }
}


//Envio de datos ajax a crear 
async function ajaxFormRegisterArrendatarios(event) {
    event.preventDefault();

    btnSaveArrendatario.value = "Enviando...";
    btnSaveArrendatario.disabled = true

    const bodyRegister = new FormData(formArrendatarioRegister)
    const register = await axios.post(formArrendatarioRegister.action, bodyRegister).then(res => {
        refresh(res.data.message)
        $('#formArrendatarioRegister').trigger("reset");
        $('#modalArrendatarioRegister').modal('hide');
    }).catch((error) => {
        if (error.response.data.errors) {
            for (var clave in error.response.data.errors) {
                let container = formArrendatarioRegister.elements.namedItem(clave);
                container.classList.add('is-invalid');
                toastr.error(`<li> ${error.response.data.errors[clave]} </li>`);
            }
            console.error(error.response.data);
        }
    })
    document.getElementById("btnSaveArrendatario").value = "Enviar";
    btnSaveArrendatario.disabled = false
}

//Envio de datos ajax a actualizar
async function ajaxFormUpdateArrendatario(event) {
    event.preventDefault();

    btnUpdateArrendatario.value = "Enviando..."
    btnUpdateArrendatario.disabled = true

    const dataUpdate = new FormData(formArrendatarioUpdate);
    const update = await axios.post(formArrendatarioUpdate.action, dataUpdate).then(res => {
        refresh(res.data.message)
        $('#formArrendatarioUpdate').trigger("reset");
        $('#modalArrendatarioUpdate').modal('hide');

    }).catch((error) => {
        for (var clave in error.response.data.errors) {
            let container = formArrendatarioUpdate.elements.namedItem(clave);
            container.classList.add('is-invalid');
            warning = document.createTextNode(`${(error.response.data.errors[clave])}`);
            insertAfter(warning, container);
        }
    })

    document.getElementById("btnUpdateArrendatario").value = "Enviar";
    btnUpdateArrendatario.disabled = false
}


// Eliminar Arrendatario
function eliminarArrendatario(ente_id) {
    toastr.options.preventDuplicates = true;
    toastr.info("<br /><button class='btn btn-sm btn-danger m-1' type='button' value='yes'>Yes</button> <button class='btn btn-sm btn-warning m-1' type ='button'  value='no' > No </button>", 'Desea eliminar este elemento ?', {
        allowHtml: true,
        onclick: async function (toast) {
            value = toast.target.value
            if (value == 'yes') {
                const url = `${SITEURL}/arrendatarios/${ente_id}`
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


async function editarArrendatario(ente_id) {

    const url = SITEURL + '/arrendatarios/' + ente_id
    const modelEdit = await axios.get(url)
    switch (modelEdit.status) {
        case 200:
            formArrendatarioUpdate.id.value = modelEdit.data.data.id;
            formArrendatarioUpdate.nombre.value = modelEdit.data.data.nombre;
            formArrendatarioUpdate.apellido.value = modelEdit.data.data.apellido;
            formArrendatarioUpdate.email.value = modelEdit.data.data.email;
            formArrendatarioUpdate.tipo_identificacion.value = modelEdit.data.data.tipo_identificacion;
            formArrendatarioUpdate.identificacion.value = modelEdit.data.data.identificacion;
            formArrendatarioUpdate.direccion.value = modelEdit.data.data.direccion;
            formArrendatarioUpdate.ciudad.value = modelEdit.data.data.ciudad;
            formArrendatarioUpdate.departamento.value = modelEdit.data.data.departamento;
            formArrendatarioUpdate.barrio.value = modelEdit.data.data.barrio;
            formArrendatarioUpdate.telefono.value = modelEdit.data.data.telefono;
            formArrendatarioUpdate.opcional_telefono.value = modelEdit.data.data.opcional_telefono
            $('#modalArrendatarioUpdate').modal('show')
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
