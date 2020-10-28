
const SearchPropietario = document.getElementById('SearchPropietario')
const SearchCodigo = document.getElementById('SearchCodigo')
const SearchDireccion = document.getElementById('SearchDireccion')
const SearchCiudad = document.getElementById('SearchCiudad')
const SearchDepartamento = document.getElementById('SearchDepartamento')
const SearchProposito = document.getElementById('SearchProposito')


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

    constFilter.append('SearchPropietario', SearchPropietario.value)
    constFilter.append('SearchCodigo', SearchCodigo.value)
    constFilter.append('SearchDireccion', SearchDireccion.value)
    constFilter.append('SearchCiudad', SearchCiudad.value)
    constFilter.append('SearchDepartamento', SearchDepartamento.value)
    constFilter.append('SearchProposito', SearchProposito.value)


    const url = '/' + SITEURL + '/inmuebles/filtrado'
    const modelFilter = await axios.post(url, constFilter)
    $body.innerHTML = ''


    infoFilter(modelFilter.data.inmuebles.length)

    if (modelFilter.data.inmuebles.length > 0) {
        await drawTable(modelFilter.data.inmuebles, $body, 'Inmueble');
    }

}

SearchPropietario.addEventListener('change', () => {
    filterInmueble()
})
SearchCodigo.addEventListener('change', () => {
    filterInmueble()
})
SearchDireccion.addEventListener('change', () => {
    filterInmueble()
})
SearchCiudad.addEventListener('change', () => {
    filterInmueble()
})
SearchDepartamento.addEventListener('change', () => {
    filterInmueble()
})
SearchProposito.addEventListener('change', () => {
    filterInmueble()
})

