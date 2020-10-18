async function getPendientes(codigo) {
    try {
        const response = await axios.get(`/${SITEURL}/pendientes/myg/details/${codigo}`)
        const data = await response.data.data
        const pendientesDraw = document.getElementById('pendientesDraw');
        let history = '';

        await data.forEach((pendiente) => {
            history += `
            <hr>
            <small class="text text-danger font-weight-bold ">${pendiente.fecha} ${pendiente.user.name} </small>
            <p class=" text text-black" style="font-size:1.3vw"> ${pendiente.body}</p>
            <small class="text text-black">Observación: ${pendiente.estado}</small>
          `
        })

        pendientesDraw.innerHTML = history

    } catch (error) {
        console.error(error);
    }
}

getPendientes(window.location.pathname.split('/')[4])
