const SearchInmueble=document.getElementById("SearchInmueble"),SearchArrendatario=document.getElementById("SearchArrendatario"),SearchCodigo=document.getElementById("SearchCodigo"),SearchInicio=document.getElementById("SearchInicio"),SearchFinal=document.getElementById("SearchFinal"),SearchProrrogado=document.getElementById("SearchProrrogado"),infoFilter=a=>{if(0==a){const a=document.createElement("tr");let b=document.createElement("td");b.setAttribute("colspan",10),b.setAttribute("id","infoTable"),b.textContent="Sin datos",a.appendChild(b),$body.appendChild(a)}};async function filterInmueble(){const a=new FormData;a.append("SearchInmueble",SearchPropietario.value),a.append("SearchArrendatario",SearchCodigo.value),a.append("SearchCodigo",SearchDireccion.value),a.append("SearchInicio",SearchCiudad.value),a.append("SearchFinal",SearchDepartamento.value),a.append("SearchProrrogado",SearchProposito.value);const b="/"+SITEURL+"/inmuebles/filtrado",c=await axios.post(b,a);$body.innerHTML="",infoFilter(c.data.inmuebles.length),0<c.data.inmuebles.length&&(await drawTable(c.data.inmuebles,$body,"Inmueble"))}