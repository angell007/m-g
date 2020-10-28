
let url = window.location.pathname

function fnDrawCategoriasElements() {
    let drawCategoriasElements = ''
    inmuebles.data.forEach(inmueble => {
        drawCategoriasElements += `<div class="col-md-4 col-sm-12">
    <figure class="card card-product">
    <div class="img-wrap"><img src="${ASSETURL}/${inmueble.portada}">
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
    
    ${(inmueble.tipo != 'local' && inmueble.tipo != 'bodega') ? ' <div class="label-rating"><i class="fa fa-bed" aria-hidden="true"></i> ' + inmueble.habitaciones + ' Habitaciones</div>' : ''}</div>
    
    <div class="label-rating"><i class="fa fa-bath" aria-hidden="true"></i>
    ${inmueble.habitaciones} Baños</div>
    <div class="label-rating"><i class="fa fa-car" aria-hidden="true"></i>
    ${inmueble.parqueadero} </div>
    
    </figcaption>
    <div class="bottom-wrap">
    <a href="${SITEURLWEB}/inmueble/myg/details/${inmueble.codigo}" class="btn btn-sm btn-primary float-right">ver mas</a>
    <div class="price-wrap h5">
    
    <span class="price-new">
    
    ${(inmueble.proposito == 'arrendamiento') ? 'Canon :   $' + inmueble.canon : 'Precio :  $' + inmueble.precio}</span>
    
    </div>
    </div>
    </figure>
    </div>
    `
    });

    let paginatorDraw = `<li class="page-item disabled"><button class="page-link btn" tabindex="-1"><<</button></li>`
    for (let index = 1; index <= inmuebles.last_page; index++) {

        paginatorDraw += `<li class="page-item"><a class="page-link  ${(index == inmuebles.current_page) ? 'bg-secondary text-white' : ''}" href="#top" onClick="navigate(${index})">${index}</a></li>`

    }
    paginatorDraw += `<li class="page-item"><a class="page-link" href="#top" onClick="navigate(${inmuebles.last_page})"> >> </a></li>`
    document.getElementById('categorias').innerHTML = drawCategoriasElements
    document.getElementById('paginator').innerHTML = paginatorDraw
}

async function navigate(params) {
    try {
        const response = await axios.get(`..${url}?page=${params}`);
        inmuebles = response.data
        console.log(response);
        fnDrawCategoriasElements()
    } catch (error) {
        console.error(error);
    }
}


const formFilter = document.getElementById('formFilter')
formFilter.addEventListener('submit', filtrar);

async function filtrar(event) {

    event.preventDefault();

    try {
        const filtros = new FormData(formFilter)
        const response = await axios.post(`${formFilter.action}`, filtros);
        inmuebles = response.data
        fnDrawCategoriasElements()
    } catch (error) {
        console.error(error);
    }
}

fnDrawCategoriasElements()

sub = 1;
if (window.location.pathname.split('/')[2] == 'locales') {
    sub = 2;
}
const aux = window.location.pathname.split('/')[2].slice(0, (window.location.pathname.split('/')[2].length) - sub)
document.getElementById('selectTipo').value = aux
