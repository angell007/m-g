const infoDetail = []
const getInmuebles = async () => {
    try {
        let select = document.getElementById('inmueble_id')
        select.innerHTML = ''
        const response = await axios.get(`${SITEURL}/inmuebles`);
        allInmuebles = Object.values((await response).data)
        infoDetail['inmuebles'] = allInmuebles;
        allInmuebles.forEach((inmueble) => {
            let opt = `
            <option value="${inmueble.codigo}"></option>`
            select.innerHTML += opt;
        })
    } catch (error) {
        console.error(error);
    }
}

getInmuebles()