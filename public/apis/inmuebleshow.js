const getInmueble=async()=>{try{const a=await axios.get(`/${SITEURL}/inmuebles/${inmueble}`);document.getElementById("portada").src=`${ASSETURL}/${a.data.data.portada}`,console.log(document.getElementById("portada").src)}catch(a){console.error(a)}},drawGallery=async()=>{try{const a=await axios.get(`/${SITEURL}/imagenes/${inmueble}`);console.log(a);let b=document.getElementById("rowGallery");b.innerHTML="";let c="";a.data.forEach(a=>{c+=` 
            
            
            
            
            <div class="col-md-4">
            <figure class="card card-product">
            <div class="img-wrap">
                <img src="${ASSETURL}/${a.path}" class="img-fluid rounded mx-auto d-block" alt="Responsive image">
                </div>
                <figcaption class="info-wrap">
                <h6 class="title">Imagen de Galeria</h6>
                
                </figcaption>
              <div class="bottom-wrap text-center">
              
              <div class="price-wrap h5">
              <a data-toggle="lightbox" data-gallery="example-gallery" data-title="Imagen Galeria " data-max-width="800" data-min-width="800" href="${ASSETURL}/${a.path}" class="btn btn-sm btn-primary float-right text-white">ver</a>
              </a>
              <button  class="btn btn-sm btn-danger float-right text-white mx-3" onclick=deleteImg(${a.id})>X</a>
              </button>
                </div>
                </div>
                </figure>
          </div>`}),b.innerHTML=c}catch(a){console.error(a)}},uploadImage=async a=>{try{a.preventDefault();const b=new FormData(document.getElementById("uploadPortadaForm")),c=await axios.post(document.getElementById("uploadPortadaForm").action,b).then(()=>{getInmueble(),document.getElementById("uploadPortadaForm").reset(),document.getElementById("cancelPortadaBtn").click()}).catch(a=>{if(a.response.data.errors){for(var b in a.response.data.errors){let c=document.getElementById("uploadPortadaForm").elements.namedItem(b);c.classList.add("is-invalid"),toastr.error(`<li> ${a.response.data.errors[b]} </li>`)}console.error(a.response.data)}})}catch(a){console.log(a)}},uploadImageGallery=async a=>{try{a.preventDefault();const b=new FormData(document.getElementById("uploadGalleryForm")),c=await axios.post(document.getElementById("uploadGalleryForm").action,b).then(()=>{drawGallery(),document.getElementById("uploadGalleryForm").reset(),document.getElementById("cancelGalleryBtn").click()}).catch(a=>{if(a.response.data.errors){for(var b in a.response.data.errors){let c=document.getElementById("uploadGalleryForm").elements.namedItem(b);c.classList.add("is-invalid"),toastr.error(`<li> ${a.response.data.errors[b]} </li>`)}console.error(a)}})}catch(a){console.log(a)}};getInmueble(),drawGallery(),document.getElementById("uploadPortadaForm").addEventListener("submit",uploadImage),document.getElementById("uploadGalleryForm").addEventListener("submit",uploadImageGallery);const deleteImg=async a=>{const b=await axios.get(`/${SITEURL}/delete-img/${a}`);console.log(b),drawGallery()};