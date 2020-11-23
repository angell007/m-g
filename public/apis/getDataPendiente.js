const btnSearch=document.getElementById("btnSearch"),filtrarContrato=document.getElementById("filtrarContrato"),identificacion=document.getElementById("identificacion"),selectContrato=document.getElementById("selectContrato"),blockFilter=document.getElementById("blockFilter"),selectContratoVal=document.getElementById("selectContratoVal");formRegisterPendiente=document.getElementById("formRegisterPendiente"),formRegisterPendiente.addEventListener("submit",async a=>{a.preventDefault();const b=new FormData;Array.from(formRegisterPendiente.elements).forEach(a=>{let c=a.value.toString();"observaciones"!=a.name&&b.append(a.name,c.replace(/[\$,]/gi,"")),"observaciones"==a.name&&b.append(a.name,c)});const c=await axios.post(formRegisterPendiente.action,b);200==c.data.code&&(formRegisterPendiente.reset(),toastr.info("Pendiente registrado correctamente"),drawPendientesHistory())}),btnSearch.addEventListener("click",async()=>{const a="/"+SITEURL+"/propietarios/search",b=await axios.post(a,{identificacion:identificacion.value});switch(b.status){case 200:if(null!=b.data.data){blockFilter.style.display="block";let a="";b.data.data.contratos.forEach(b=>{a+=`<option value="${b.id}">${b.codigo}</option>`}),selectContratoVal.innerHTML=a}else alert("Propietario No encontrado ");break;default:}});const actualizarPendiente=async a=>{let b=document.getElementById("estadoPendiente").value;await axios.put(`/${SITEURL}/pendientes/update`,{id:a,estado:b});drawPendientesHistory(),toastr.info("Estado de pendiente actualizado")},pendientesHistory=document.getElementById("pendientesDraw");btngetData.addEventListener("click",async()=>{drawPendientesHistory()});const drawPendientesHistory=async()=>{const a=await axios.get(`/${SITEURL}/pendientes/myg/details/${selectContratoVal.value}`);if(htmlForm=` 

    <input type="hidden" name="contrato_id" value="${selectContratoVal.value}">

    <div class="form-group col-md-6">
    <label for="">Fecha</label>
        <input type="date" class="form-control form-control-sm" name="fecha" required>
    </div>

    <div class="form-group col-md-6">
    <label for="">Estado</label>
        <select class="form-control form-control-sm" name="estado">
        <option value="activa">Activa</option>
        <option value="inactiva">Inactiva</option>
        </select>
    </div>

    <div class="form-group col-md-12">
    <label for="">Tarea</label>
        <textarea name="body" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group col-md-12">
        <input type="submit" class="btn btn-outline-info  btn-sm " id="btnSearch" value="Enviar">
    </div>
`,document.getElementById("formRegisterPendiente").innerHTML=await htmlForm,null!=a.data.data){let b="";a.data.data.forEach(a=>{b+=`
                <hr>
                <small class="text text-danger font-weight-bold ">${a.fecha} ${a.user.name}
                        <select class="btn btn-sm btn-outline-info mx-auto" id="estadoPendiente">
                        <option value="activa" ${"activa"==a.estado?"selected":""}>Activa</option>
                        <option value="inactiva" ${"inactiva"==a.estado?"selected":""}>Inactiva</option>
                        </select>
                </small>
                <button class="btn btn-sm btn-outline-info mx-auto" onclick="actualizarPendiente(${a.id})">Actualizar</button>
                <br>
                <small class="text text-black">Observación: ${a.body}</small>
                `}),pendientesHistory.innerHTML=b}};