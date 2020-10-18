let formContratoUpdate = document.getElementById('formContratoUpdate');
let btnUpdateContrato = document.getElementById("btnUpdateContrato");
formContratoUpdate.addEventListener('submit', ajaxFormUpdateContrato);



let btnUpdateArrendatario = document.getElementById("btnUpdateArrendatario");
let formArrendatarioUpdate = document.getElementById('formArrendatarioUpdate');
formArrendatarioUpdate.addEventListener('submit', ajaxFormUpdateArrendatario);


let btnUpdatePropietarios = document.getElementById("btnUpdatePropietarios");
let formPropietarioUpdate = document.getElementById('formPropietarioUpdate');
formPropietarioUpdate.addEventListener('submit', ajaxFormUpdatePropietarios);

let btnUpdateInmuebles = document.getElementById("btnUpdateInmueble");
let formInmuebleUpdate = document.getElementById('formInmuebleUpdate');
formInmuebleUpdate.addEventListener('submit', ajaxFormUpdateInmuebles);

const refresh = async (success) => {
    $body.innerHTML = "";
    getData()
    await toastr.remove()
    await toastr.info('Success:', success);
}

// function fnDrawCategoriasElements(data, parent) {
//     let drawElements = ''

//     data.forEach(inmueble => {
//         drawElements += `<div class="col-md-4 col-sm-12">
//         <figure class="card card-product" style="width:100%">
//             <div class="img-wrap"><img src="/${ASSETURL}/${inmueble.portada}">
//             </div>
//             <figcaption class="info-wrap">

//                 <h4 class="title text-uppercase tex-center my-2">${inmueble.tipo}</h4>
//                 <div class="label-rating">Cod: ${inmueble.codigo} </div>
//                 <hr>

//                 <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
//                     Dpto: ${inmueble.departamento} </div>
//                 <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
//                     Ciudad: ${inmueble.ciudad} </div>
//                 <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
//                     Direccion: ${inmueble.direccion} </div>

//                 <p class="desc">${inmueble.descripcion}</p>
//                 <div class="rating-wrap">
//                     <ul class="rating-stars">
//                         <li style="width:80%" class="stars-active">
//                             <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
//                                 class="fa fa-star"></i><i class="fa fa-star"></i>
//                         </li>
//                         <li>
//                             <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
//                                 class="fa fa-star"></i><i class="fa fa-star"></i>
//                         </li>
//                     </ul>
//                     <hr>

//                     ${(inmueble.tipo != 'local' && inmueble.tipo != 'bodega') ? ' <div class="label-rating"><iclass="fa fa-bed" aria-hidden="true"></i> ' + inmueble.habitaciones + ' Habitaciones</div>' :
//                 ''}
//                 </div>

//                 <div class="label-rating"><i class="fa fa-bath" aria-hidden="true"></i>
//                     ${inmueble.habitaciones} Baños</div>
//                 <div class="label-rating"><i class="fa fa-car" aria-hidden="true"></i>
//                     ${inmueble.parqueadero} </div>

//             </figcaption>
//             <div class="bottom-wrap">
//                 <a href="${SITEURLWEB}/inmueble/myg/details/${inmueble.codigo}" class="btn btn-sm btn-primary float-right">ver mas</a>
//                 <div class="price-wrap h5">

//                     <span class="price-new">

//                         ${(inmueble.proposito == 'arrendamiento') ? 'Canon : $' + inmueble.canon : 'Precio : $' +
//                 inmueble.precio}</span>

//                 </div>
//             </div>
//         </figure>
//     </div>
//     `
//     });

//     document.getElementById(parent).innerHTML = drawElements
// }

// function fnDrawElementleft(data, parent) {
//     let drawElements = ''
//     data.forEach(inmueble => {
//         drawElements += `<figure class="card-product my-3 py-3">
//         <div class="img-wrap"><img src="/${ASSETURL}/${inmueble.portada}"></div>

//         <div class="bottom-wrap">
//             <div class="price-wrap h5">

//                 <span class="price-new">

//                     ${(inmueble.proposito == 'arrendamiento') ? 'Canon : $' + inmueble.canon : 'Precio : $' +
//                 inmueble.precio}</span>

//             </div>
//         </div>

//         <figcaption class="info-wrap">

//         Mas informaciòn: 
//         <br>
//         <div class="label-rating"><i class="fa fa-phone" aria-hidden="true"></i>
//             : 3172603279</div>
//         <div class="label-rating"><i class="fa fa-envelope" aria-hidden="true"></i>
//             : example@gmail.com </div>
//         <hr>



//             <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
//                 En: ${inmueble['proposito']} </div>

//                 <br>

//             <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
//                 Dpto: ${inmueble.departamento} </div>
//             <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
//                 Ciudad: ${inmueble.ciudad} </div>
//             <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
//                 Direccion: ${inmueble.direccion} </div>


//             <hr>

//             <div class="label-rating"><i class="fa fa-home" aria-hidden="true"></i>
//                 ${inmueble.habitaciones} Habitaciones</div>

//             <div class="label-rating"><i class="fa fa-bath" aria-hidden="true"></i>
//                 ${inmueble.habitaciones} Baños</div>

//             <div class="label-rating"><i class="fa fa-car" aria-hidden="true"></i>
//                 ${inmueble.parqueadero} </div>


//             <!-- <p class="desc">${inmueble.descripcion}</p> -->

//             <div class="rating-wrap">
//                 <ul class="rating-stars">
//                     <li style="width:80%" class="stars-active">
//                         <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
//                             class="fa fa-star"></i><i class="fa fa-star"></i>
//                     </li>
//                     <li>
//                         <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
//                             class="fa fa-star"></i><i class="fa fa-star"></i>
//                     </li>
//                 </ul>
//                 <hr>

//                 ${(inmueble.tipo != 'local' && inmueble.tipo != 'bodega') ? ' <div class="label-rating"> <i class="fa fa-bed" aria-hidden="true"></i> '
//                 + inmueble.habitaciones + ' Habitaciones</div>' : ''}
//             </div>



//         </figcaption>

//     </figure>

//     <div class="col-md-12">
//         <div>
//             <span>Description</span>
//             <span class="text-center">
//                 <p class="text-justify">
//                     ${inmueble['descripcion']} </p>
//             </span>
//         </div>
//     </div>`

//     });

//     document.getElementById(parent).innerHTML = drawElements
// }

// const fnDrawGallery = async (data, parent) => {
//     try {
//         console.log(data);
//         let photo = ''
//         data.forEach(element => {
//             photo += ` 
//             <div class="col-md-4 col-sm-12">
//             <figure class="card card-product">
//               <div class="img-wrap">
//                 <img src="/${ASSETURL}/${element.path}" class="img-fluid rounded mx-auto d-block" alt="Responsive image">
//               </div>
//               <div class="bottom-wrap">
//                 <div class="price-wrap h5">
//                 <a data-toggle="lightbox" data-gallery="example-gallery" data-title="Imagen Galeria " data-max-width="800" data-min-width="800" href="/${ASSETURL}/${element.path}" class="btn btn-sm btn-primary float-right text-white">ver</a>
//                 </a>
//                 </div>
//               </div>
//             </figure>
//           </div>`
//         });

//         document.getElementById(parent).innerHTML = photo

//     } catch (error) {
//         console.error(error);
//     }
// }

async function editarArrendatario(ente_id) {

    const url = `/${SITEURL}/arrendatarios/${ente_id}`
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
            break;
        default:
            break;
    }
}

async function editarPropietario(ente_id) {

    const url = `/${SITEURL}/propietarios/${ente_id}`
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

async function editarInmueble(ente_id) {

    const url = `/${SITEURL}/inmuebles/${ente_id}`
    const modelEdit = await axios.get(url)


    switch (modelEdit.status) {
        case 200:
            // document.getElementById('codigoUpdate').innerText = modelEdit.data.data.codigo
            formInmuebleUpdate.id.value = modelEdit.data.data.id;
            formInmuebleUpdate.canon.value = modelEdit.data.data.canon;
            formInmuebleUpdate.ciudad.value = modelEdit.data.data.ciudad;
            formInmuebleUpdate.departamento.value = modelEdit.data.data.departamento;
            formInmuebleUpdate.descripcion.value = modelEdit.data.data.descripcion;
            formInmuebleUpdate.direccion.value = modelEdit.data.data.direccion;
            formInmuebleUpdate.habitaciones.value = modelEdit.data.data.habitaciones;
            formInmuebleUpdate.proposito.value = modelEdit.data.data.proposito;
            formInmuebleUpdate.tipo.value = modelEdit.data.data.tipo;
            formInmuebleUpdate.precio.value = modelEdit.data.data.precio;
            // formInmuebleUpdate.propietario_id.value = modelEdit.data.data.propietario['identificacion'];
            break;
        default:
            break;
    }
}
async function filtrar(codigo) {

    try {
        const response = await axios.get(`/${SITEURL}/contrato/myg/details/${codigo}`);
        data = response.data

        document.getElementById('codigoContrato').innerText = response.data.data.codigo

        editarArrendatario(response.data.data.arrendatario_id)
        editarPropietario(response.data.data.propietario_id)
        editarInmueble(response.data.data.inmueble_id)

        formContratoUpdate.id.value = response.data.data.id;
        formContratoUpdate.observaciones.value = response.data.data.observaciones;
        formContratoUpdate.fin.value = response.data.data.fin;
        formContratoUpdate.inicio.value = response.data.data.inicio;
        formContratoUpdate.inmueble_id.value = response.data.data.inmueble.codigo;
        formContratoUpdate.arrendatario_id.value = response.data.data.arrendatario.identificacion;

    } catch (error) {
        console.error(error);
    }
}



//Envio de datos ajax a actualizar
async function ajaxFormUpdateContrato(event) {
    event.preventDefault();

    btnUpdateContrato.value = "Enviando..."
    btnUpdateContrato.disabled = true

    const dataUpdate = new FormData(formContratoUpdate);
    const update = await axios.post(formContratoUpdate.action, dataUpdate).then(res => {
        // refresh(res.data)
        console.log(res.data);
        // $('#formContratoUpdate').trigger("reset");
        // $('#modalContratoUpdate').modal('hide');

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

//Envio de datos ajax a actualizar
async function ajaxFormUpdateArrendatario(event) {
    event.preventDefault();

    btnUpdateArrendatario.value = "Enviando..."
    btnUpdateArrendatario.disabled = true

    const dataUpdate = new FormData(formArrendatarioUpdate);
    const update = await axios.post(formArrendatarioUpdate.action, dataUpdate).then(res => {
        refresh(res.data)
        console.log(res.data);
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

//Envio de datos ajax a actualizar
async function ajaxFormUpdateInmuebles(event) {
    event.preventDefault();

    btnUpdateInmuebles.value = "Enviando..."
    btnUpdateInmuebles.disabled = true

    const dataUpdate = new FormData(formInmuebleUpdate);
    const update = await axios.post(formInmuebleUpdate.action, dataUpdate).then(res => {
        refresh(res.data)
        console.log(res.data);
        $('#formInmuebleUpdate').trigger("reset");
        $('#modalInmueblesUpdate').modal('hide');

    }).catch((error) => {
        for (var clave in error.response.data.errors) {
            let container = formInmuebleUpdate.elements.namedItem(clave);
            container.classList.add('is-invalid');
            warning = document.createTextNode(`${(error.response.data.errors[clave])}`);
            insertAfter(warning, container);
        }
    })

    document.getElementById("btnUpdateInmueble").value = "Enviar";
    btnUpdateInmuebles.disabled = false
}


filtrar(window.location.pathname.split('/')[4])
