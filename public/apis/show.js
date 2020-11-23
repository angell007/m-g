function fnDrawCategoriasElements(a,b){let c="";a.forEach(a=>{c+=`<div class="col-md-4 col-sm-12">
        <figure class="card card-product" style="width:100%">
            <div class="img-wrap"><img src="/${ASSETURL}/${a.portada}">
            </div>
            <figcaption class="info-wrap">
    
                <h4 class="title text-uppercase tex-center my-2">${a.tipo}</h4>
                <div class="label-rating">Cod: ${a.codigo} </div>
                <hr>
    
                <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
                    Dpto: ${a.departamento} </div>
                <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
                    Ciudad: ${a.ciudad} </div>
                <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
                    Direccion: ${a.direccion} </div>
    
                <p class="desc">${a.descripcion}</p>
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
    
                    ${"local"!=a.tipo&&"bodega"!=a.tipo?" <div class=\"label-rating\"><iclass=\"fa fa-bed\" aria-hidden=\"true\"></i> "+a.habitaciones+" Habitaciones</div>":""}
                </div>
    
                <div class="label-rating"><i class="fa fa-bath" aria-hidden="true"></i>
                    ${a.habitaciones} Baños</div>
                <div class="label-rating"><i class="fa fa-car" aria-hidden="true"></i>
                    ${a.parqueadero} </div>
    
            </figcaption>
            <div class="bottom-wrap">
                <a href="${SITEURLWEB}/inmueble/myg/details/${a.codigo}" class="btn btn-sm btn-primary float-right">ver mas</a>
                <div class="price-wrap h5">
    
                    <span class="price-new">
    
                        ${"arrendamiento"==a.proposito?"Canon : $"+a.canon:"Precio : $"+a.precio}</span>
    
                </div>
            </div>
        </figure>
    </div>
    `}),document.getElementById(b).innerHTML=c}function fnDrawElementleft(a,b){let c="";a.forEach(a=>{c+=`<figure class="card-product my-3 py-3">
        <div class="img-wrap"><img src="/${ASSETURL}/${a.portada}"></div>
    
        <div class="bottom-wrap">
            <div class="price-wrap h5">
    
                <span class="price-new">
    
                    ${"arrendamiento"==a.proposito?"Canon : $"+a.canon:"Precio : $"+a.precio}</span>
    
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
                En: ${a.proposito} </div>
    
                <br>
    
            <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
                Dpto: ${a.departamento} </div>
            <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
                Ciudad: ${a.ciudad} </div>
            <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
                Direccion: ${a.direccion} </div>
    
    
            <hr>
    
            <div class="label-rating"><i class="fa fa-home" aria-hidden="true"></i>
                ${"local"!=a.tipo&&"bodega"!=a.tipo?" <div class=\"label-rating\"> <i class=\"fa fa-bed\" aria-hidden=\"true\"></i> "+a.habitaciones+" Habitaciones</div>":""}
            </div>
    
            <div class="label-rating"><i class="fa fa-bath" aria-hidden="true"></i>
                ${a.baños} Baños</div>
    
            <div class="label-rating"><i class="fa fa-car" aria-hidden="true"></i>
                ${a.parqueadero} </div>
    
    
            <!-- <p class="desc">${a.descripcion}</p> -->
    
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

            </div>
    
    
    
        </figcaption>
    
    </figure>
    
    <div class="col-md-12">
        <div>
            <span>Description</span>
            <span class="text-center">
                <p class="text-justify">
                    ${a.descripcion} </p>
            </span>
        </div>
    </div>`}),document.getElementById(b).innerHTML=c}const fnDrawGallery=async(a,b)=>{try{console.log(a);let c="";a.forEach(a=>{c+=` 
            <div class="col-md-4 col-sm-12">
            <figure class="card card-product">
              <div class="img-wrap">
                <img src="/${ASSETURL}/${a.path}" class="img-fluid rounded mx-auto d-block" alt="Responsive image">
              </div>
              <div class="bottom-wrap">
                <div class="price-wrap h5">
                <a data-toggle="lightbox" data-gallery="example-gallery" data-title="Imagen Galeria " data-max-width="800" data-min-width="800" href="/${ASSETURL}/${a.path}" class="btn btn-sm btn-primary float-right text-white">ver</a>
                </a>
                </div>
              </div>
            </figure>
          </div>`}),document.getElementById(b).innerHTML=c}catch(a){console.error(a)}};async function filtrar(a){try{document.getElementById("leftShow").innerHTML="<img src=\"https://i.pinimg.com/originals/fe/f1/f2/fef1f20aa76540808c4f5b004bfe49bd.gif\">.";const b=await axios.get(`/${SITEURL}/inmueble/myg/details/${a}`);data=b.data,console.log(data[0].inmueble.imagenes.push({path:data[0].inmueble.portada})),fnDrawElementleft(Array.of(data[0].inmueble),"leftShow"),fnDrawGallery(data[0].inmueble.imagenes,"rowGallery");let c=data[0].relacionados.filter(a=>a.codigo!=data[0].inmueble.codigo);fnDrawCategoriasElements(c,"relacionados")}catch(a){console.error(a)}}filtrar(window.location.pathname.split("/")[4]);