function fnDrawCategoriasElements(data, parent) {
    let drawElements = ''

    data.forEach(inmueble => {
        drawElements += `<div class="col-md-4 col-sm-12">
        <figure class="card card-product" style="width:100%">
            <div class="img-wrap"><img src="/${ASSETURL}/${inmueble.portada}">
            </div>
            <figcaption class="info-wrap">
    
                <h4 class="title text-uppercase tex-center my-2">${inmueble.tipo}</h4>
                <div class="label-rating">Cod: ${inmueble.codigo} </div>
                <hr>
    
                <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
                    Dpto: ${inmueble.departamento} </div>
                <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
                    Ciudad: ${inmueble.ciudad} </div>
                <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
                    Direccion: ${inmueble.direccion} </div>
    
                <p class="desc">${inmueble.descripcion}</p>
                <div class="rating-wrap">
                    <ul class="rating-stars">
                        <li style="width:80%" class="stars-active">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                class="fa fa-star"></i><i class="fa fa-star"></i>
                        </li>
                        <li>
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                class="fa fa-star"></i><i class="fa fa-star"></i>
                        </li>
                    </ul>
                    <hr>
    
                    ${(inmueble.tipo != 'local' && inmueble.tipo != 'bodega') ? ' <div class="label-rating"><iclass="fa fa-bed" aria-hidden="true"></i> ' + inmueble.habitaciones + ' Habitaciones</div>' :
                ''}
                </div>
    
                <div class="label-rating"><i class="fa fa-bath" aria-hidden="true"></i>
                    ${inmueble.habitaciones} Baños</div>
                <div class="label-rating"><i class="fa fa-car" aria-hidden="true"></i>
                    ${inmueble.parqueadero} </div>
    
            </figcaption>
            <div class="bottom-wrap">
                <a href="${SITEURLWEB}/inmueble/myg/details/${inmueble.codigo}" class="btn btn-sm btn-primary float-right">ver mas</a>
                <div class="price-wrap h5">
    
                    <span class="price-new">
    
                        ${(inmueble.proposito == 'arrendamiento') ? 'Canon : $' + inmueble.canon : 'Precio : $' +
                inmueble.precio}</span>
    
                </div>
            </div>
        </figure>
    </div>
    `
    });

    document.getElementById(parent).innerHTML = drawElements
}

function fnDrawElementleft(data, parent) {
    let drawElements = ''
    data.forEach(inmueble => {
        drawElements += `<figure class="card-product my-3 py-3">
        <div class="img-wrap"><img src="/${ASSETURL}/${inmueble.portada}"></div>
    
        <div class="bottom-wrap">
            <div class="price-wrap h5">
    
                <span class="price-new">
    
                    ${(inmueble.proposito == 'arrendamiento') ? 'Canon : $' + inmueble.canon : 'Precio : $' +
                inmueble.precio}</span>
    
            </div>
        </div>
    
        <figcaption class="info-wrap">
    
        Mas informaciòn: 
        <br>
        <div class="label-rating"><i class="fa fa-phone" aria-hidden="true"></i>
            : 3172603279</div>
        <div class="label-rating"><i class="fa fa-envelope" aria-hidden="true"></i>
            : example@gmail.com </div>
        <hr>

         

            <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
                En: ${inmueble['proposito']} </div>
    
                <br>
    
            <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
                Dpto: ${inmueble.departamento} </div>
            <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
                Ciudad: ${inmueble.ciudad} </div>
            <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
                Direccion: ${inmueble.direccion} </div>
    
    
            <hr>
    
            <div class="label-rating"><i class="fa fa-home" aria-hidden="true"></i>
                ${inmueble.habitaciones} Habitaciones</div>
    
            <div class="label-rating"><i class="fa fa-bath" aria-hidden="true"></i>
                ${inmueble.habitaciones} Baños</div>
    
            <div class="label-rating"><i class="fa fa-car" aria-hidden="true"></i>
                ${inmueble.parqueadero} </div>
    
    
            <!-- <p class="desc">${inmueble.descripcion}</p> -->
    
            <div class="rating-wrap">
                <ul class="rating-stars">
                    <li style="width:80%" class="stars-active">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i><i class="fa fa-star"></i>
                    </li>
                    <li>
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i><i class="fa fa-star"></i>
                    </li>
                </ul>
                <hr>
    
                ${(inmueble.tipo != 'local' && inmueble.tipo != 'bodega') ? ' <div class="label-rating"> <i class="fa fa-bed" aria-hidden="true"></i> '
                + inmueble.habitaciones + ' Habitaciones</div>' : ''}
            </div>
    
    
    
        </figcaption>
    
    </figure>
    
    <div class="col-md-12">
        <div>
            <span>Description</span>
            <span class="text-center">
                <p class="text-justify">
                    ${inmueble['descripcion']} </p>
            </span>
        </div>
    </div>`

    });

    document.getElementById(parent).innerHTML = drawElements
}

const fnDrawGallery = async (data, parent) => {
    try {
        console.log(data);
        let photo = ''
        data.forEach(element => {
            photo += ` 
            <div class="col-md-4 col-sm-12">
            <figure class="card card-product">
              <div class="img-wrap">
                <img src="/${ASSETURL}/${element.path}" class="img-fluid rounded mx-auto d-block" alt="Responsive image">
              </div>
              <div class="bottom-wrap">
                <div class="price-wrap h5">
                <a data-toggle="lightbox" data-gallery="example-gallery" data-title="Imagen Galeria " data-max-width="800" data-min-width="800" href="/${ASSETURL}/${element.path}" class="btn btn-sm btn-primary float-right text-white">ver</a>
                </a>
                </div>
              </div>
            </figure>
          </div>`
        });

        document.getElementById(parent).innerHTML = photo

    } catch (error) {
        console.error(error);
    }
}
async function filtrar(codigo) {

    try {
        const response = await axios.get(`/${SITEURL}/inmueble/myg/details/${codigo}`);
        data = response.data

        console.log(data[0].inmueble['imagenes'].push({ 'path': data[0].inmueble.portada }))

        fnDrawElementleft(Array.of(data[0].inmueble), 'leftShow')
        fnDrawGallery(data[0].inmueble['imagenes'], 'rowGallery')

        let relacionados = data[0].relacionados.filter((property) => {
            return property['codigo'] != data[0].inmueble.codigo;
        })

        fnDrawCategoriasElements(relacionados, 'relacionados')
    } catch (error) {
        console.error(error);
    }
}

filtrar(window.location.pathname.split('/')[4])
