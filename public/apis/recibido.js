async function getRecibidos(codigo) {
    try {
        const response = await axios.get(`/${SITEURL}/recibidos/myg/details/${codigo}`)
        const data = await response.data.data
        const recibidoDraw = document.getElementById('recibidoDraw');
        let history = '';

        await data.forEach((recibido) => {
            history += `
            <hr>
            <small class="text text-danger font-weight-bold ">${recibido.fecha} ${recibido.user.name} </small>
            <p class=" text text-black" style="font-size:1.3vw">Concepto: ${recibido.concepto} <span>${recibido.valor}</span></p>
            <small class="text text-black">Observación: ${recibido.observaciones}</small>
          `
        })

        recibidoDraw.innerHTML = history

    } catch (error) {
        console.error(error);
    }
}

getRecibidos(window.location.pathname.split('/')[4])
