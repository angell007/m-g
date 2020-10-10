
const selectInmueble = document.getElementById('customID')
selectInmueble.addEventListener('change', setearInfo)


async function setearInfo(event) {
    if (event.target.value != '') {
        detailUnique = infoDetail['inmuebles'].filter((inmueble) => {
            return inmueble.codigo == event.target.value
        })
        document.getElementById('canon').value = parseFloat(detailUnique[0].canon)
    }
}