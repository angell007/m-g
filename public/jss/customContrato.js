
const settearInfo = document.getElementById('customID')
settearInfo.addEventListener('change', setearInfo)

async function setearInfo(event) {

    console.log('uno');

    if (event.target.value != '') {
        detailUnique = infoDetail['inmuebles'].filter((inmueble) => {
            return inmueble.codigo == event.target.value
        })
        document.getElementById('canon').value = parseFloat(detailUnique[0].canon)
        document.getElementById('administracion').value = parseFloat(detailUnique[0].aministracion)
    }
}