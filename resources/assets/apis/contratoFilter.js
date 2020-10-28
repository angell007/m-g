
const SearchInmueble = document.getElementById('SearchInmueble')
const SearchArrendatario = document.getElementById('SearchArrendatario')
const SearchCodigo = document.getElementById('SearchCodigo')
const SearchInicio = document.getElementById('SearchInicio')
const SearchFinal = document.getElementById('SearchFinal')
const SearchProrrogado = document.getElementById('SearchProrrogado')


const infoFilter = (models) => {
    if (models == 0) {
        const $tr = document.createElement("tr");
        let $cell = document.createElement("td");
        $cell.setAttribute('colspan', 10)
        $cell.setAttribute('id', 'infoTable')
        $cell.textContent = 'Sin datos'
        $tr.appendChild($cell);
        $body.appendChild($tr);
    }
}

async function filterInmueble() {
    const constFilter = new FormData()

    constFilter.append('SearchInmueble', SearchPropietario.value)
    constFilter.append('SearchArrendatario', SearchCodigo.value)
    constFilter.append('SearchCodigo', SearchDireccion.value)
    constFilter.append('SearchInicio', SearchCiudad.value)
    constFilter.append('SearchFinal', SearchDepartamento.value)
    constFilter.append('SearchProrrogado', SearchProposito.value)


    const url = '/' + SITEURL + '/inmuebles/filtrado'
    const modelFilter = await axios.post(url, constFilter)
    $body.innerHTML = ''


    infoFilter(modelFilter.data.inmuebles.length)

    if (modelFilter.data.inmuebles.length > 0) {
        await drawTable(modelFilter.data.inmuebles, $body, 'Inmueble');
    }

}

// SearchInmueble.addEventListener('change', () => {
//     filterInmueble()
// })
// SearchArrendatario.addEventListener('change', () => {
//     filterInmueble()
// })
// SearchCodigo.addEventListener('change', () => {
//     filterInmueble()
// })
// SearchInicio.addEventListener('change', () => {
//     filterInmueble()
// })
// SearchFinal.addEventListener('change', () => {
//     filterInmueble()
// })
// SearchProrrogado.addEventListener('change', () => {
//     filterInmueble()
// })


