const Searchnombre = document.getElementById('Searchnombre')
const Searchapellido = document.getElementById('Searchapellido')
const Searchemail = document.getElementById('Searchemail')
const Searchdocuemento = document.getElementById('Searchdocuemento')

const infoFilter = (models) => {
    if (models == 0) {
        const $tr = document.createElement("tr");
        let $cell = document.createElement("td");
        $cell.setAttribute('colspan', 7)
        $cell.setAttribute('id', 'infoTable')
        $cell.textContent = 'Sin datos'
        $tr.appendChild($cell);
        $body.appendChild($tr);
    }
}

async function filterPropietario() {
    const constFilter = new FormData()
    constFilter.append('Searchnombre', Searchnombre.value)
    constFilter.append('Searchapellido', Searchapellido.value)
    constFilter.append('Searchemail', Searchemail.value)
    constFilter.append('Searchdocuemento', Searchdocuemento.value)

    const url = '/' + SITEURL + '/propietarios/filtrado'
    const modelFilter = await axios.post(url, constFilter)
    $body.innerHTML = ''


    infoFilter(modelFilter.data.propietarios.length)

    if (modelFilter.data.propietarios.length > 0) {
        await drawTable(modelFilter.data.propietarios, $body, 'Propietario');
    }

}

Searchnombre.addEventListener('change', () => {
    filterPropietario()
})
Searchapellido.addEventListener('change', () => {
    filterPropietario()
})
Searchemail.addEventListener('change', () => {
    filterPropietario()
})
Searchdocuemento.addEventListener('change', () => {
    filterPropietario()
})

