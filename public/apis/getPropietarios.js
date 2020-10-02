const getPropietarios = async () => {
    try {
        let select = document.getElementById('propietario_id')
        select.innerHTML = ''
        const response = await axios.get(`${SITEURL}/propietarios`);
        allPropietarios = Object.values((await response).data)
        allPropietarios.forEach((propietario) => {
            let opt = `
            <option value="${propietario.identificacion}">
            ${propietario.nombre}
            ${propietario.apellido}
            </option>`
            select.innerHTML += opt;
        })
    } catch (error) {
        console.error(error);
    }
}

getPropietarios()