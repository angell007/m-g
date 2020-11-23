const actualizarPendiente = async (value) => {
    let estado = document.getElementById('estadoPendiente').value
    const updatePendiente = await axios.put(`/${SITEURL}/pendientes/update`, { 'id': value, 'estado': estado })
    toastr.info('Estado de pendiente actualizado')
}

async function getPendientes(codigo) {
    try {
        const response = await axios.get(`/${SITEURL}/pendientes/myg/details/${codigo}`)
        const data = await response.data.data
        const pendientesDraw = document.getElementById('pendientesDraw');
        let history = '';

        await data.forEach((pendiente) => {
            history += `
            <hr>
            <select class="btn btn-sm btn-outline-info mx-auto" id="estadoPendiente">
            <option value="activa" ${(pendiente.estado == 'activa') ? 'selected' : ''}>Activa</option>
            <option value="inactiva" ${(pendiente.estado == 'inactiva') ? 'selected' : ''}>Inactiva</option>
            </select>
            </small>
            <button class="btn btn-sm btn-outline-info mx-auto" onclick="actualizarPendiente(${pendiente.id})">Actualizar</button>
            <br>

            <small class="text text-danger font-weight-bold ">${pendiente.fecha} ${pendiente.user.name} </small>
            <p class=" text text-black" style="font-size:1.3vw"> ${pendiente.body}</p>
          `
        })

        pendientesDraw.innerHTML = history

    } catch (error) {
        console.error(error);
    }
}

getPendientes(window.location.pathname.split('/')[4])
