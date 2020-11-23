const getAlerts=async()=>{const a=await axios.get(`/${SITEURL}/pendientes`);document.getElementById("countAlertsPendientes").innerText=a.data.length+"+";let b="";a.data.forEach(a=>{b+=`
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-info">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">${a.fecha} Creada por ${a.user.name}</div>
                        <span class="font-weight-bold">${a.body}!</span>
                        <br>
                        <small>Contrato : ${a.contrato.codigo}</small>
                    </div>
                </a>`}),document.getElementById("listAlertsPendientes").innerHTML=b};