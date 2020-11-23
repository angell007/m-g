const btnSearch=document.getElementById("btnSearch"),filtrarContrato=document.getElementById("filtrarContrato"),identificacion=document.getElementById("identificacion"),selectContrato=document.getElementById("selectContrato"),blockFilter=document.getElementById("blockFilter");let descuentos=0,setComision=0;const min=document.getElementById("min"),max=document.getElementById("max"),selectContratoVal=document.getElementById("selectContratoVal");formRegisterPagoRealizado=document.getElementById("formRegisterPagoRealizado"),formRegisterPagoRealizado.addEventListener("submit",async a=>{if(a.preventDefault(),""!=document.getElementById("min").value&&""!=document.getElementById("max").value){const a=new FormData;Array.from(formRegisterPagoRealizado.elements).forEach(b=>{let c=b.value.toString();"observaciones"!=b.name&&a.append(b.name,c.replace(/[\$,]/gi,"")),"observaciones"==b.name&&a.append(b.name,c)}),a.append("desde",document.getElementById("min").value),a.append("hasta",document.getElementById("max").value);const b=await axios.post(formRegisterPagoRealizado.action,a);200==b.data.code&&(formRegisterPagoRealizado.reset(),toastr.info("Pago registrado correctamente"),document.getElementById("idToPrint").value=b.data.data.id,document.getElementById("btnPrint").style.display="block")}else return toastr.error("Debe Seleccionar fechas de corte"),!1});const printf=async a=>{await axios.post("/print/realizado",{id:a},{responseType:"blob"}).then(a=>{const b=window.URL.createObjectURL(new Blob([a.data])),c=document.createElement("a");c.href=b,c.setAttribute("download",a.headers["content-disposition"].split("filename=")[1]),document.body.appendChild(c),c.click()})},drawTickest=async a=>{htmlTickes="",a.forEach(a=>{a.pago_realizados!=null&&null!=a.pago_realizados&&a.pago_realizados.forEach(b=>{htmlTickes+=` 
                          <div class="card p-2">
                                <label class="label-control" for=""> Fecha ${b.fecha} Contrato ${a.codigo} </label>                            
                                <label class="label-control" for="">Total Cancelado  ${b.valor} </label>
                                
                                <button type="button" class="btn btn-outline-info btn-sm"
                                value="Imprimir Recibo" onclick=printf("${b.id}")>Imprimir Recibo</button>
                          </div>
            
                `})}),document.getElementById("drawTickest").innerHTML=await htmlTickes},calcular=async()=>{let a=document.getElementById("otros"),b=document.getElementById("canon"),c=document.getElementById("administracion"),d=document.getElementById("descuentos"),e=document.getElementById("comision"),f=document.getElementById("iva"),g=document.getElementById("totalDebitos"),h=document.getElementById("totalCreditos"),i=document.getElementById("valor");a.value=currency(a.value).format(),b.value=currency(b.value).format(),c.value=currency(c.value).format(),d.value=currency(d.value).format(),e.value=currency(b.value).multiply(setComision).divide(100).format(),f.value=currency(e.value).multiply(19).divide(100).format(),g.value=currency(a.value).add(b.value).add(c.value).format(),h.value=currency(d.value).add(e.value).add(f.value).format(),i.value=currency(g.value).subtract(h.value).format()};btnSearch.addEventListener("click",async()=>{const a="/"+SITEURL+"/propietarios/search",b=await axios.post(a,{identificacion:identificacion.value});switch(b.status){case 200:if(null!=b.data.data){console.log(b.data),blockFilter.style.display="block";let a="";b.data.data.contratos.forEach(b=>{a+=`<option value="${b.id}">${b.codigo}</option>`}),selectContratoVal.innerHTML=a,drawTickest(b.data.data.contratos)}else alert("Propietario No encontrado ");break;default:}}),btngetData.addEventListener("click",async()=>{const a=new FormData;a.append("min",min.value),a.append("max",max.value),a.append("codigo",selectContratoVal.value);const b="/"+SITEURL+"/contrato/myg/getInfo",c=await axios.post(b,a);0<c.data.data.descuentos.length&&c.data.data.descuentos.forEach(a=>{descuentos+=parseFloat(a.valor)}),setComision=c.data.data.inmueble.comision,htmlForm=` <div class="table-responsive">
    <table class="table">
        <thead class="text-center">
            <tr>
                <th>Cuenta</th>
                <th>Debitos</th>
                <th>Creditos</th>
            </tr>
        </thead>
        <tbody>
            <tr class="">
                <td>Canon de Arriendo</td>
                <td>
                    <input class="form-control form-control-sm" autocomplete="off" onchange="calcular()" name="canon" id="canon" value="${currency(c.data.data.inmueble.canon).format()}">
                </td>
                <td></td>
            </tr>

            <tr class="">
                <td>Administracion</td>
                <td>
                    <input class="form-control form-control-sm" autocomplete="off" onchange="calcular()" name="administracion" id="administracion" value="${currency(c.data.data.inmueble.administracion).format()}">
                </td>
                <td></td>
            </tr>

            <tr class="">
                <td>Otros</td>
                <td>
                    <input class="form-control form-control-sm" autocomplete="off" onchange="calcular()" name="otros" id="otros" value="${currency().format()}">
                </td>
                <td></td>
            </tr>

            <tr class="">
                <td>Descuentos </td>
                <td></td>
                <td>
                    <input class="form-control form-control-sm" autocomplete="off" onchange="calcular()" name="descuentos" id="descuentos" value="${currency(descuentos).format()}">
                </td>
            </tr>

            <tr class="">
                <td>Comision</td>
                <td></td>
                <td>
                    <input class="form-control form-control-sm" autocomplete="off" onchange="calcular()" name="comision" id="comision" value="">
                </td>
            </tr>

            <tr class="">
                <td>Iva</td>
                <td></td>
                <td>
                    <input class="form-control form-control-sm" autocomplete="off" onchange="calcular()" name="iva" id="iva" value="19">
                </td>
            </tr>

            <tr class="">
                <td>Sub Total</td>
                <td>
                    <input class="form-control form-control-sm" name="totalDebitos" readOnly autocomplete="off" onchange="calcular()"
                        id="totalDebitos">
                </td>
                <td>
                    <input class="form-control form-control-sm" name="totalCreditos" readOnly autocomplete="off" onchange="calcular()"
                        id="totalCreditos">
                </td>
            </tr>

            <tr class="">
                <td>A pagar</td>
                <td colspan="2">
                    <input class="form-control form-control-sm" readOnly autocomplete="off" onchange="calcular()" name="valor" id="valor">
                </td>

            </tr>

        </tbody>
    </table>
</div>


        <input type="hidden" name="codigo" value="${c.data.data.codigo}">

        
    <div class="form-group col-md-4">
    <label for="">Fecha de Pago</label>
        <input type="date" class="form-control" name="fecha" required>
    </div>

    <div class="form-group col-md-12">
    <label for="">Observacion</label>
        <textarea name="observaciones" id="" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group col-md-12">
        <input type="submit" class="btn btn-outline-info  btn-sm " id="btnSearch" value="Enviar">
    </div>
`,document.getElementById("formRegisterPagoRealizado").innerHTML=await htmlForm,calcular()});