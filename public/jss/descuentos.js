async function getDescuentos(codigo) {
    try {
        const response = await axios.get(`/${SITEURL}/descuentos/myg/details/${codigo}`)
        const data = await response.data.data
        const descuentosDraw = document.getElementById('descuentosDraw');
        let history = '';

        await data.forEach((descuento) => {
            history += `
            <hr>
            <small class="text text-danger font-weight-bold ">${descuento.fecha} ${descuento.user.name} </small>
            <p class=" text text-black" style="font-size:1.3vw">Concepto: ${descuento.concepto} <span>${descuento.valor}</span></p>
            <small class="text text-black">Observación: ${descuento.observaciones}</small>
          `
        })

        descuentosDraw.innerHTML = history

    } catch (error) {
        console.error(error);
    }
}

getDescuentos(window.location.pathname.split('/')[4])
