const getArrendatarios=async()=>{try{let a=document.getElementById("arrendatario_id");a.innerHTML="";const b=await axios.get(`${SITEURL}/arrendatarios`);allArrendatarios=Object.values((await b).data),allArrendatarios.forEach(b=>{let c=`
            <option value="${b.identificacion}">
            ${b.nombre}
            ${b.apellido}
            </option>`;a.innerHTML+=c})}catch(a){console.error(a)}};getArrendatarios();