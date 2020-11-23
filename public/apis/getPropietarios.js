const getPropietarios=async()=>{try{let a=document.getElementById("propietario_id");a.innerHTML="";const b=await axios.get(`${SITEURL}/propietarios`);allPropietarios=Object.values((await b).data),allPropietarios.forEach(b=>{let c=`
            <option value="${b.identificacion}"  data-value="${b.identificacion}">
            ${b.nombre}
            ${b.apellido}
            </option>`;a.innerHTML+=c})}catch(a){console.error(a)}};getPropietarios();