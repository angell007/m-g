let url=window.location.pathname;function fnDrawCategoriasElements(){let a="";inmuebles.data.forEach(b=>{a+=`<div class="col-md-4 col-sm-12">
    <figure class="card card-product">
    <div class="img-wrap"><img src="${ASSETURL}/${b.portada}">
    </div>
    <figcaption class="info-wrap">
    
    <h4 class="title text-uppercase tex-center my-2">${b.tipo}</h4>
    <div class="label-rating">Cod: ${b.codigo} </div>
    <hr>
    
    <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
    Dpto: ${b.departamento} </div>
    <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
    Ciudad: ${b.ciudad} </div>
    <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
    Direccion: ${b.direccion} </div>
    
    <p class="desc">${b.descripcion}</p>
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
    
    ${"local"!=b.tipo&&"bodega"!=b.tipo?" <div class=\"label-rating\"><i class=\"fa fa-bed\" aria-hidden=\"true\"></i> "+b.habitaciones+" Habitaciones</div>":""}</div>
    
    <div class="label-rating"><i class="fa fa-bath" aria-hidden="true"></i>
    ${b.habitaciones} Baños</div>
    <div class="label-rating"><i class="fa fa-car" aria-hidden="true"></i>
    ${b.parqueadero} </div>
    
    </figcaption>
    <div class="bottom-wrap">
    <a href="${SITEURLWEB}/inmueble/myg/details/${b.codigo}" class="btn btn-sm btn-primary float-right">ver mas</a>
    <div class="price-wrap h5">
    
    <span class="price-new">
    
    ${"arrendamiento"==b.proposito?"Canon :   $"+b.canon:"Precio :  $"+b.precio}</span>
    
    </div>
    </div>
    </figure>
    </div>
    `});let b=`<li class="page-item disabled"><button class="page-link btn" tabindex="-1"><<</button></li>`;for(let a=1;a<=inmuebles.last_page;a++)b+=`<li class="page-item"><a class="page-link  ${a==inmuebles.current_page?"bg-secondary text-white":""}" href="#top" onClick="navigate(${a})">${a}</a></li>`;b+=`<li class="page-item"><a class="page-link" href="#top" onClick="navigate(${inmuebles.last_page})"> >> </a></li>`,document.getElementById("categorias").innerHTML=a,document.getElementById("paginator").innerHTML=b}async function navigate(a){try{const b=await axios.get(`..${url}?page=${a}`);inmuebles=b.data,console.log(b),fnDrawCategoriasElements()}catch(a){console.error(a)}}const formFilter=document.getElementById("formFilter");formFilter.addEventListener("submit",filtrar);async function filtrar(a){a.preventDefault();try{const a=new FormData(formFilter),b=await axios.post(`${formFilter.action}`,a);inmuebles=b.data,fnDrawCategoriasElements()}catch(a){console.error(a)}}fnDrawCategoriasElements(),sub=1,"locales"==window.location.pathname.split("/")[2]&&(sub=2);const aux=window.location.pathname.split("/")[2].slice(0,window.location.pathname.split("/")[2].length-sub);document.getElementById("selectTipo").value=aux;