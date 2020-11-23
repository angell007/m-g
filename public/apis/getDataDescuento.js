const btnSearch=document.getElementById("btnSearch"),filtrarContrato=document.getElementById("filtrarContrato"),identificacion=document.getElementById("identificacion"),selectContrato=document.getElementById("selectContrato"),blockFilter=document.getElementById("blockFilter"),selectContratoVal=document.getElementById("selectContratoVal");formRegisterDescuento=document.getElementById("formRegisterDescuento"),formRegisterDescuento.addEventListener("submit",async a=>{a.preventDefault();const b=new FormData;Array.from(formRegisterDescuento.elements).forEach(a=>{let c=a.value.toString();"observaciones"!=a.name&&b.append(a.name,c.replace(/[\$,]/gi,"")),"observaciones"==a.name&&b.append(a.name,c)});const c=await axios.post(formRegisterDescuento.action,b);200==c.data.code&&(formRegisterDescuento.reset(),toastr.info("Pago registrado correctamente"),drawDescuentosHistory())}),btnSearch.addEventListener("click",async()=>{const a="/"+SITEURL+"/propietarios/search",b=await axios.post(a,{identificacion:identificacion.value});switch(b.status){case 200:if(null!=b.data.data){blockFilter.style.display="block";let a="";b.data.data.contratos.forEach(b=>{a+=`<option value="${b.id}">${b.codigo}</option>`}),selectContratoVal.innerHTML=a}else alert("Propietario No encontrado ");break;default:}});const descuentosHistory=document.getElementById("descuentosDraw");btngetData.addEventListener("click",async()=>{drawDescuentosHistory()});const drawDescuentosHistory=async()=>{const a=await axios.get(`/${SITEURL}/descuentos/myg/details/${selectContratoVal.value}`);if(htmlForm=` 

    <input type="hidden" name="contrato_id" value="${selectContratoVal.value}">

    <div class="form-group col-md-4">
    <label for="">Fecha</label>
        <input type="date" class="form-control" name="fecha" required>
    </div>

    <div class="form-group col-md-8">
    <label for="">Concepto</label>
        <input name="concepto" class="form-control" ></input>
    </div>

    <div class="form-group col-md-6">
    <label for="">Valor</label>
        <input name="valor" class="form-control" ></input>
    </div>

    <div class="form-group col-md-12">
    <label for="">Observacion</label>
        <textarea name="observaciones" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group col-md-12">
        <input type="submit" class="btn btn-outline-info  btn-sm " id="btnSearch" value="Enviar">
    </div>
`,document.getElementById("formRegisterDescuento").innerHTML=await htmlForm,null!=a.data.data){let b="";a.data.data.forEach(a=>{b+=`
                <hr>
                <small class="text text-danger font-weight-bold ">${a.fecha} ${a.user.name} </small>
                <p class=" text text-black" style="font-size:1.3vw">Concepto: ${a.concepto} 
                <br>
                <span>${currency(a.valor).format()}</span>
                </p>
                <small class="text text-black">Observación: ${a.observaciones}</small>
              `}),descuentosHistory.innerHTML=b}};