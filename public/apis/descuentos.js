async function getDescuentos(a){try{const b=await axios.get(`/${SITEURL}/descuentos/myg/details/${a}`),c=await b.data.data,d=document.getElementById("descuentosDraw");let e="";await c.forEach(a=>{e+=`
            <hr>
            <small class="text text-danger font-weight-bold ">${a.fecha} ${a.user.name} </small>
            <p class=" text text-black" style="font-size:1.3vw">Concepto: ${a.concepto} <span>${a.valor}</span></p>
            <small class="text text-black">Observación: ${a.observaciones}</small>
          `}),d.innerHTML=e}catch(a){console.error(a)}}getDescuentos(window.location.pathname.split("/")[4]);