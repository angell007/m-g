const getAlerts = async () => {
    // console.log('--');
    const getPendientes = await axios.get(`/${SITEURL}/pendientes`)
    document.getElementById('countAlertsPendientes').innerText = getPendientes.data.length + '+';
    let drawListAlerts = ''
    getPendientes.data.forEach(element => {
        drawListAlerts += `
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-info">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">${element.fecha} Creada por ${element.user.name}</div>
                        <span class="font-weight-bold">${element.body}!</span>
                        <br>
                        <small>Contrato : ${element.contrato.codigo}</small>
                    </div>
                </a>`
    });

    document.getElementById('listAlertsPendientes').innerHTML = drawListAlerts
}