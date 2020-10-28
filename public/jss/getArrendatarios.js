const getArrendatarios = async () => {
    try {
        let select = document.getElementById('arrendatario_id')
        select.innerHTML = ''
        const response = await axios.get(`${SITEURL}/arrendatarios`);
        allArrendatarios = Object.values((await response).data)
        allArrendatarios.forEach((arrendatario) => {
            let opt = `
            <option value="${arrendatario.identificacion}">
            ${arrendatario.nombre}
            ${arrendatario.apellido}
            </option>`
            select.innerHTML += opt;
        })
    } catch (error) {
        console.error(error);
    }
}

getArrendatarios()