let formContratoUpdate=document.getElementById("formContratoUpdate"),btnUpdateContrato=document.getElementById("btnUpdateContrato");formContratoUpdate.addEventListener("submit",ajaxFormUpdateContrato);let btnUpdateArrendatario=document.getElementById("btnUpdateArrendatario"),formArrendatarioUpdate=document.getElementById("formArrendatarioUpdate");formArrendatarioUpdate.addEventListener("submit",ajaxFormUpdateArrendatario);let btnUpdatePropietarios=document.getElementById("btnUpdatePropietarios"),formPropietarioUpdate=document.getElementById("formPropietarioUpdate");formPropietarioUpdate.addEventListener("submit",ajaxFormUpdatePropietarios);let btnUpdateInmuebles=document.getElementById("btnUpdateInmueble"),formInmuebleUpdate=document.getElementById("formInmuebleUpdate");formInmuebleUpdate.addEventListener("submit",ajaxFormUpdateInmuebles);const refresh=async a=>{$body.innerHTML="",getData(),await toastr.remove(),await toastr.info("Success:",a)};async function editarArrendatario(a){const b=`/${SITEURL}/arrendatarios/${a}`,c=await axios.get(b);switch(c.status){case 200:formArrendatarioUpdate.id.value=c.data.data.id,formArrendatarioUpdate.nombre.value=c.data.data.nombre,formArrendatarioUpdate.apellido.value=c.data.data.apellido,formArrendatarioUpdate.email.value=c.data.data.email,formArrendatarioUpdate.tipo_identificacion.value=c.data.data.tipo_identificacion,formArrendatarioUpdate.identificacion.value=c.data.data.identificacion,formArrendatarioUpdate.direccion.value=c.data.data.direccion,formArrendatarioUpdate.ciudad.value=c.data.data.ciudad,formArrendatarioUpdate.departamento.value=c.data.data.departamento,formArrendatarioUpdate.barrio.value=c.data.data.barrio,formArrendatarioUpdate.telefono.value=c.data.data.telefono,formArrendatarioUpdate.opcional_telefono.value=c.data.data.opcional_telefono;break;default:}}async function editarPropietario(a){const b=`/${SITEURL}/propietarios/${a}`,c=await axios.get(b);switch(c.status){case 200:formPropietarioUpdate.id.value=c.data.data.id,formPropietarioUpdate.nombre.value=c.data.data.nombre,formPropietarioUpdate.apellido.value=c.data.data.apellido,formPropietarioUpdate.email.value=c.data.data.email,formPropietarioUpdate.tipo_identificacion.value=c.data.data.tipo_identificacion,formPropietarioUpdate.identificacion.value=c.data.data.identificacion,formPropietarioUpdate.direccion.value=c.data.data.direccion,formPropietarioUpdate.ciudad.value=c.data.data.ciudad,formPropietarioUpdate.departamento.value=c.data.data.departamento,formPropietarioUpdate.barrio.value=c.data.data.barrio,formPropietarioUpdate.telefono.value=c.data.data.telefono,formPropietarioUpdate.opcional_telefono.value=c.data.data.opcional_telefono,$("#modalPropietarioUpdate").modal("show");break;default:}}async function editarInmueble(a){const b=`/${SITEURL}/inmuebles/${a}`,c=await axios.get(b);switch(c.status){case 200:formInmuebleUpdate.id.value=c.data.data.id,formInmuebleUpdate.canon.value=c.data.data.canon,formInmuebleUpdate.ciudad.value=c.data.data.ciudad,formInmuebleUpdate.departamento.value=c.data.data.departamento,formInmuebleUpdate.descripcion.value=c.data.data.descripcion,formInmuebleUpdate.direccion.value=c.data.data.direccion,formInmuebleUpdate.habitaciones.value=c.data.data.habitaciones,formInmuebleUpdate.proposito.value=c.data.data.proposito,formInmuebleUpdate.tipo.value=c.data.data.tipo,formInmuebleUpdate.precio.value=c.data.data.precio;break;default:}}async function filtrar(a){try{const b=await axios.get(`/${SITEURL}/contrato/myg/details/${a}`);data=b.data,console.log(b),document.getElementById("codigoContrato").innerText=b.data.data.codigo,editarArrendatario(b.data.data.arrendatario_id),editarPropietario(b.data.data.propietario_id),editarInmueble(b.data.data.inmueble_id),formContratoUpdate.id.value=b.data.data.id,formContratoUpdate.observaciones.value=b.data.data.observaciones,document.getElementById("canon").value=b.data.data.inmueble.canon,document.getElementById("administracion").value=b.data.data.inmueble.administracion,formContratoUpdate.fin.value=b.data.data.fin,formContratoUpdate.inicio.value=b.data.data.inicio,formContratoUpdate.inmueble_id.value=b.data.data.inmueble.codigo,formContratoUpdate.arrendatario_id.value=b.data.data.arrendatario.identificacion}catch(a){console.error(a)}}async function ajaxFormUpdateContrato(a){a.preventDefault(),btnUpdateContrato.value="Enviando...",btnUpdateContrato.disabled=!0;const b=new FormData(formContratoUpdate),c=await axios.post(formContratoUpdate.action,b).then(a=>{console.log(a.data)}).catch(a=>{for(var b in a.response.data.errors){let c=formContratoUpdate.elements.namedItem(b);c.classList.add("is-invalid"),warning=document.createTextNode(`${a.response.data.errors[b]}`),insertAfter(warning,c)}});document.getElementById("btnUpdateContrato").value="Enviar",btnUpdateContrato.disabled=!1}async function ajaxFormUpdatePropietarios(a){a.preventDefault(),btnUpdatePropietarios.value="Enviando...",btnUpdatePropietarios.disabled=!0;const b=new FormData(formPropietarioUpdate),c=await axios.post(formPropietarioUpdate.action,b).then(a=>{refresh(a.data),console.log(a.data),$("#formPropietarioUpdate").trigger("reset"),$("#modalPropietariosUpdate").modal("hide")}).catch(a=>{for(var b in a.response.data.errors){let c=formPropietarioUpdate.elements.namedItem(b);c.classList.add("is-invalid"),warning=document.createTextNode(`${a.response.data.errors[b]}`),insertAfter(warning,c)}});document.getElementById("btnUpdatePropietarios").value="Enviar",btnUpdatePropietarios.disabled=!1}async function ajaxFormUpdateArrendatario(a){a.preventDefault(),btnUpdateArrendatario.value="Enviando...",btnUpdateArrendatario.disabled=!0;const b=new FormData(formArrendatarioUpdate),c=await axios.post(formArrendatarioUpdate.action,b).then(a=>{refresh(a.data),console.log(a.data),$("#formArrendatarioUpdate").trigger("reset"),$("#modalArrendatarioUpdate").modal("hide")}).catch(a=>{for(var b in a.response.data.errors){let c=formArrendatarioUpdate.elements.namedItem(b);c.classList.add("is-invalid"),warning=document.createTextNode(`${a.response.data.errors[b]}`),insertAfter(warning,c)}});document.getElementById("btnUpdateArrendatario").value="Enviar",btnUpdateArrendatario.disabled=!1}async function ajaxFormUpdateInmuebles(a){a.preventDefault(),btnUpdateInmuebles.value="Enviando...",btnUpdateInmuebles.disabled=!0;const b=new FormData(formInmuebleUpdate),c=await axios.post(formInmuebleUpdate.action,b).then(a=>{refresh(a.data),console.log(a.data),$("#formInmuebleUpdate").trigger("reset"),$("#modalInmueblesUpdate").modal("hide")}).catch(a=>{for(var b in a.response.data.errors){let c=formInmuebleUpdate.elements.namedItem(b);c.classList.add("is-invalid"),warning=document.createTextNode(`${a.response.data.errors[b]}`),insertAfter(warning,c)}});document.getElementById("btnUpdateInmueble").value="Enviar",btnUpdateInmuebles.disabled=!1}filtrar(window.location.pathname.split("/")[4]);