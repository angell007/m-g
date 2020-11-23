function getREalizados(n){try{const i=await;axios.get(`/${SITEURL}/realizados/myg/details/${n}`);const r=await;i.data.data;const u=document.getElementById("realizadoDraw");let t="";await;r.forEach(n=>{t+=`
            <hr>
            <small class="text text-danger font-weight-bold ">${n.fecha} ${n.user.name} </small>
            <p class=" text text-black" style="font-size:1.3vw">Canon: ${currency(n.canon).format()} <span></span></p>
            <p class=" text text-black" style="font-size:1.3vw">Administracion: ${currency(n.administracion).format()} <span></span></p>
            <p class=" text text-black" style="font-size:1.3vw">Otros: ${currency(n.otros).format()} <span></span></p>
            <p class=" text text-black" style="font-size:1.3vw">Descuentos: ${currency(n.descuentos).format()} <span></span></p>
            <p class=" text text-black" style="font-size:1.3vw">Comision: ${currency(n.comision).format()} <span></span></p>
            <p class=" text text-black" style="font-size:1.3vw">Total: ${currency(n.valor).format()} <span></span></p>
            <small class="text text-black">Observación: ${n.observaciones}</small>
          `});u.innerHTML=t}catch(t){console.error(t)}}async;getREalizados(window.location.pathname.split("/")[4])