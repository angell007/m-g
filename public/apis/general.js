const drawTable=async(a,b,c)=>{a.forEach(d=>{const e=document.createElement("tr");Object.keys(a[0]).forEach(a=>{if("id"!=a&&"tipo_identificacion"!=a){let b=document.createElement("td");b.textContent=d[a],e.appendChild(b)}if("id"==a){let b=document.createElement("td");b.innerHTML=`
                <a class="btn rounded-circle btn-sm btn-primary text-white tooltip-wrapper"
                href="javascript:void(0)" onclick="editar${c}(${d[a]})"
                title="Editar">
                <i class="fa  fa-edit"></i>
                </a><a class="btn rounded-circle btn-sm btn-danger text-white tooltip-wrapper" 
                href="javascript:void(0)" onclick="eliminar${c}(${d[a]})"
                title="Eliminar">
                <i class="fa  fa-trash" aria-hidden="true"></i>
                </a>`,e.appendChild(b)}}),b.appendChild(e)})},insertAfter=(a,b)=>{b.parentNode.insertBefore(a,b.nextSibling)};