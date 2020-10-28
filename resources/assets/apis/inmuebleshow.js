const getInmueble = async () => {
    try {
        const response = await axios.get(`/${SITEURL}/inmuebles/${inmueble}`);
        document.getElementById('portada').src = `${ASSETURL}/${response.data.data.portada}`
        console.log(document.getElementById('portada').src);
    } catch (error) {
        console.error(error);
    }
}


const drawGallery = async () => {
    try {
        const response = await axios.get(`/${SITEURL}/imagenes/${inmueble}`);
        console.log(response);
        let gallery = document.getElementById('rowGallery')
        gallery.innerHTML = ''
        let photo = ''


        response.data.forEach(element => {
            photo += ` 
            
            
            
            
            <div class="col-md-4">
            <figure class="card card-product">
            <div class="img-wrap">
                <img src="${ASSETURL}/${element.path}" class="img-fluid rounded mx-auto d-block" alt="Responsive image">
                </div>
                <figcaption class="info-wrap">
                <h6 class="title">Imagen de Galeria</h6>
                
                </figcaption>
              <div class="bottom-wrap text-center">
              
              <div class="price-wrap h5">
              <a data-toggle="lightbox" data-gallery="example-gallery" data-title="Imagen Galeria " data-max-width="800" data-min-width="800" href="${ASSETURL}/${element.path}" class="btn btn-sm btn-primary float-right text-white">ver</a>
              </a>
              <button  class="btn btn-sm btn-danger float-right text-white mx-3" onclick=deleteImg(${element.id})>X</a>
              </button>
                </div>
                </div>
                </figure>
          </div>`
        });

        // gallery.insertAdjacentHTML('beforeend', photo)
        gallery.innerHTML = photo

    } catch (error) {
        console.error(error);
    }
}



const uploadImage = async (event) => {
    try {
        event.preventDefault();
        const bodyRegister = new FormData(document.getElementById('uploadPortadaForm'))
        const upload = await axios.post(document.getElementById('uploadPortadaForm').action, bodyRegister).then(res => {
            getInmueble();
            document.getElementById('uploadPortadaForm').reset()
            document.getElementById('cancelPortadaBtn').click()
        }).catch((error) => {
            if (error.response.data.errors) {
                for (var clave in error.response.data.errors) {
                    let container = document.getElementById('uploadPortadaForm').elements.namedItem(clave);
                    container.classList.add('is-invalid');
                    toastr.error(`<li> ${error.response.data.errors[clave]} </li>`);
                }
                console.error(error.response.data);
            }
        })
    } catch (error) {
        console.log(error);
    }
}

const uploadImageGallery = async (event) => {
    try {
        event.preventDefault();
        const bodyRegister = new FormData(document.getElementById('uploadGalleryForm'))
        const upload = await axios.post(document.getElementById('uploadGalleryForm').action, bodyRegister).then(res => {
            drawGallery();
            document.getElementById('uploadGalleryForm').reset()
            document.getElementById('cancelGalleryBtn').click()
        }).catch((error) => {
            if (error.response.data.errors) {
                for (var clave in error.response.data.errors) {
                    let container = document.getElementById('uploadGalleryForm').elements.namedItem(clave);
                    container.classList.add('is-invalid');
                    toastr.error(`<li> ${error.response.data.errors[clave]} </li>`);
                }
                console.error(error);
            }
        })
    } catch (error) {
        console.log(error);
    }
}

getInmueble()
drawGallery()

document.getElementById('uploadPortadaForm').addEventListener('submit', uploadImage)
document.getElementById('uploadGalleryForm').addEventListener('submit', uploadImageGallery)


const deleteImg = async (id) => {
    const response = await axios.get(`/${SITEURL}/delete-img/${id}`);
    console.log(response);
    drawGallery();
}