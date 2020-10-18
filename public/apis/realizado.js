async function getREalizados(codigo) {
    try {
        const response = await axios.get(`/${SITEURL}/realizados/myg/details/${codigo}`)
        const data = await response.data.data
        const realizadoDraw = document.getElementById('realizadoDraw');
        let history = '';

        await data.forEach((realizado) => {
            history += `
            <hr>
            <small class="text text-danger font-weight-bold ">${realizado.fecha} ${realizado.user.name} </small>
            <p class=" text text-black" style="font-size:1.3vw">Concepto: ${realizado.concepto} <span>${realizado.valor}</span></p>
            <small class="text text-black">Observación: ${realizado.observaciones}</small>
          `
        })

        realizadoDraw.innerHTML = history

    } catch (error) {
        console.error(error);
    }
}

getREalizados(window.location.pathname.split('/')[4])
