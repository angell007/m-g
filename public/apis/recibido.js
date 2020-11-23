function getRecibidos(n){try{const t=await;axios.get(`/${SITEURL}/recibidos/myg/details/${n}`);const r=await;t.data.data;console.log(t);const u=document.getElementById("recibidoDraw");let i="";await;r.forEach(n=>{i+=`
            <hr>
             <small class="text text-danger font-weight-bold ">${n.fecha} ${n.user.name} </small>
             <p class=" text text-black" style="font-size:1.3vw">Canon: ${currency(n.canon).format()} <span></span></p>
            <p class=" text text-black" style="font-size:1.3vw">Administracion: ${currency(n.administracion).format()} <span></span></p>
            <p class=" text text-black" style="font-size:1.3vw">otros: ${currency(n.otros).format()} <span></span></p>
            <p class=" text text-black" style="font-size:1.3vw">Total: ${currency(n.valor).format()} <span></span></p>
            <small class="text text-black">Observación: ${n.observaciones}</small>
          `});u.innerHTML=i}catch(t){console.error(t)}}async;getRecibidos(window.location.pathname.split("/")[4])