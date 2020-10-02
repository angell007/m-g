
let propietarios = [];
let $body = document.querySelector("#bodyTablePropietarios");
let btnSavePropietarios = document.getElementById("btnSavePropietarios");
let btnUpdatePropietarios = document.getElementById("btnUpdatePropietarios");

let formPropietarioRegister = document.getElementById('formPropietarioRegister');
formPropietarioRegister.addEventListener('submit', ajaxFormRegisterPropietarios);

let formPropietarioUpdate = document.getElementById('formPropietarioUpdate');
formPropietarioUpdate.addEventListener('submit', ajaxFormUpdatePropietarios);


const info = () => {
    if (propietarios.length == 0) {
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
        const response = await axios.get(`${SITEURL}/propietarios`);
        propietarios = Object.values((await response).data)
        await drawTable(propietarios, $body, 'Propietario');
        if (document.getElementById('infoTable') != null) {
            document.getElementById('infoTable').remove()
        }
    } catch (error) {
        console.error(error);
    }
}


//Envio de datos ajax a crear 
async function ajaxFormRegisterPropietarios(event) {
    event.preventDefault();

    btnSavePropietarios.value = "Enviando...";
    btnSavePropietarios.disabled = true

    const bodyRegister = new FormData(formPropietarioRegister)
    const register = await axios.post(formPropietarioRegister.action, bodyRegister).then(res => {
        refresh(res.data)
        $('#formPropietarioRegister').trigger("reset");
        $('#modalPropietariosRegister').modal('hide');
    }).catch((error) => {
        if (error.response.data.errors) {
            for (var clave in error.response.data.errors) {
                let container = formPropietarioRegister.elements.namedItem(clave);
                container.classList.add('is-invalid');
                toastr.error(`<li> ${error.response.data.errors[clave]} </li>`);
            }
            console.error(error.response.data);
        }
    })
    document.getElementById("btnSavePropietarios").value = "Enviar";
    btnSavePropietarios.disabled = false
}

//Envio de datos ajax a actualizar
async function ajaxFormUpdatePropietarios(event) {
    event.preventDefault();

    btnUpdatePropietarios.value = "Enviando..."
    btnUpdatePropietarios.disabled = true

    const dataUpdate = new FormData(formPropietarioUpdate);
    const update = await axios.post(formPropietarioUpdate.action, dataUpdate).then(res => {
        refresh(res.data)
        console.log(res.data);
        $('#formPropietarioUpdate').trigger("reset");
        $('#modalPropietariosUpdate').modal('hide');

    }).catch((error) => {
        for (var clave in error.response.data.errors) {
            let container = formPropietarioUpdate.elements.namedItem(clave);
            container.classList.add('is-invalid');
            warning = document.createTextNode(`${(error.response.data.errors[clave])}`);
            insertAfter(warning, container);
        }
    })

    document.getElementById("btnUpdatePropietarios").value = "Enviar";
    btnUpdatePropietarios.disabled = false
}


// Eliminar Propietarios
function eliminarPropietario(ente_id) {
    toastr.options.preventDuplicates = true;
    toastr.info("<br /><button class='btn btn-sm btn-danger m-1' type='button' value='yes'>Yes</button> <button class='btn btn-sm btn-warning m-1' type ='button'  value='no' > No </button>", 'Desea eliminar este elemento ?', {
        allowHtml: true,
        onclick: async function (toast) {
            value = toast.target.value
            if (value == 'yes') {
                const url = `${SITEURL}/propietarios/${ente_id}`
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


async function editarPropietario(ente_id) {

    const url = SITEURL + '/propietarios/' + ente_id
    const modelEdit = await axios.get(url)
    switch (modelEdit.status) {
        case 200:
            formPropietarioUpdate.id.value = modelEdit.data.data.id;
            formPropietarioUpdate.nombre.value = modelEdit.data.data.nombre;
            formPropietarioUpdate.apellido.value = modelEdit.data.data.apellido;
            formPropietarioUpdate.email.value = modelEdit.data.data.email;
            formPropietarioUpdate.tipo_identificacion.value = modelEdit.data.data.tipo_identificacion;
            formPropietarioUpdate.identificacion.value = modelEdit.data.data.identificacion;
            formPropietarioUpdate.direccion.value = modelEdit.data.data.direccion;
            formPropietarioUpdate.ciudad.value = modelEdit.data.data.ciudad;
            formPropietarioUpdate.departamento.value = modelEdit.data.data.departamento;
            formPropietarioUpdate.barrio.value = modelEdit.data.data.barrio;
            formPropietarioUpdate.telefono.value = modelEdit.data.data.telefono;
            formPropietarioUpdate.opcional_telefono.value = modelEdit.data.data.opcional_telefono
            $('#modalPropietarioUpdate').modal('show')
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
