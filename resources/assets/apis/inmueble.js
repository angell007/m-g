
let inmuebles = [];
let $body = document.querySelector("#bodyTableInmuebles");
let btnSaveInmueble = document.getElementById("btnSaveInmueble");
let btnUpdateInmueble = document.getElementById("btnUpdateInmueble");

let formInmuebleRegister = document.getElementById('formInmuebleRegister');
formInmuebleRegister.addEventListener('submit', ajaxFormRegisterInmuebles);

let formInmuebleUpdate = document.getElementById('formInmuebleUpdate');
formInmuebleUpdate.addEventListener('submit', ajaxFormUpdateInmuebles);


const info = () => {
    if (inmuebles.length == 0) {
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
        const response = await axios.get(`${SITEURL}/inmuebles`);
        inmuebles = Object.values((await response).data)
        if (inmuebles.length > 0) {
            await drawTable(inmuebles, $body, 'Inmueble');
            if (document.getElementById('infoTable') != null) {
                document.getElementById('infoTable').remove()
            }
        }
    } catch (error) {
        console.error(error);
    }
}


//Envio de datos ajax a crear 
async function ajaxFormRegisterInmuebles(event) {
    event.preventDefault();

    btnSaveInmueble.value = "Enviando...";
    btnSaveInmueble.disabled = true

    const bodyRegister = new FormData(formInmuebleRegister)
    const register = await axios.post(formInmuebleRegister.action, bodyRegister).then(res => {
        refresh(res.data.message)
        $('#formInmuebleRegister').trigger("reset");
        $('#modalInmuebleRegister').modal('hide');
    }).catch((error) => {
        if (error.response.data.errors) {
            for (var clave in error.response.data.errors) {
                let container = formInmuebleRegister.elements.namedItem(clave);
                container.classList.add('is-invalid');
                toastr.error(`<li> ${error.response.data.errors[clave]} </li>`);
            }
            console.error(error.response.data);
        }
    })
    document.getElementById("btnSaveInmueble").value = "Enviar";
    btnSaveInmueble.disabled = false
}

//Envio de datos ajax a actualizar
async function ajaxFormUpdateInmuebles(event) {
    event.preventDefault();

    btnUpdateInmueble.value = "Enviando..."
    btnUpdateInmueble.disabled = true

    const dataUpdate = new FormData(formInmuebleUpdate);
    const update = await axios.post(formInmuebleUpdate.action, dataUpdate).then(res => {
        refresh(res.data.message)
        console.log(res.data);
        $('#formInmuebleUpdate').trigger("reset");
        $('#modalInmuebleUpdate').modal('hide');

    }).catch((error) => {
        for (var clave in error.response.data.errors) {
            let container = formInmuebleUpdate.elements.namedItem(clave);
            container.classList.add('is-invalid');
            warning = document.createTextNode(`${(error.response.data.errors[clave])}`);
            insertAfter(warning, container);
        }
    })

    document.getElementById("btnUpdateInmueble").value = "Enviar";
    btnUpdateInmueble.disabled = false
}


// Eliminar Inmuebles
function eliminarInmueble(ente_id) {
    toastr.options.preventDuplicates = true;
    toastr.info("<br /><button class='btn btn-sm btn-danger m-1' type='button' value='yes'>Yes</button> <button class='btn btn-sm btn-warning m-1' type ='button'  value='no' > No </button>", 'Desea eliminar este elemento ?', {
        allowHtml: true,
        onclick: async function (toast) {
            value = toast.target.value
            if (value == 'yes') {
                const url = `${SITEURL}/inmuebles/${ente_id}`
                try {
                    const success = await axios.delete(url);
                    console.log(success);
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


async function editarInmueble(ente_id) {

    const url = SITEURL + '/inmuebles/' + ente_id
    const modelEdit = await axios.get(url)


    switch (modelEdit.status) {
        case 200:
            console.log(modelEdit);
            document.getElementById('codigoUpdate').innerText = modelEdit.data.data.codigo
            formInmuebleUpdate.id.value = modelEdit.data.data.id;
            formInmuebleUpdate.estado.value = modelEdit.data.data.estado;
            formInmuebleUpdate.direccion.value = modelEdit.data.data.direccion,
                formInmuebleUpdate.propietario_id.value = modelEdit.data.data.propietario['identificacion'],
                formInmuebleUpdate.ciudad.value = modelEdit.data.data.ciudad,
                formInmuebleUpdate.barrio.value = modelEdit.data.data.barrio,
                formInmuebleUpdate.amoblado.value = modelEdit.data.data.amoblado,
                formInmuebleUpdate.parqueadero.value = modelEdit.data.data.parqueadero,
                formInmuebleUpdate.baños.value = modelEdit.data.data.baños,
                formInmuebleUpdate.departamento.value = modelEdit.data.data.departamento,
                formInmuebleUpdate.administracion.value = modelEdit.data.data.administracion,
                formInmuebleUpdate.comision.value = modelEdit.data.data.comision,
                formInmuebleUpdate.tipo.value = modelEdit.data.data.tipo,
                formInmuebleUpdate.proposito.value = modelEdit.data.data.proposito,
                formInmuebleUpdate.habitaciones.value = modelEdit.data.data.habitaciones,
                formInmuebleUpdate.canon.value = modelEdit.data.data.canon,
                formInmuebleUpdate.descripcion.value = modelEdit.data.data.descripcion
            formInmuebleUpdate.precio.value = modelEdit.data.data.precio;
            $('#modalInmuebleUpdate').modal('show')
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
