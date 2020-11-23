const drawTable=async(a,b,c)=>{console.log(a),a.forEach(d=>{const e=document.createElement("tr");Object.keys(a[0]).forEach((a,b)=>{if(0==b){let a=document.createElement("td");a.textContent=d.propietario.identificacion,e.appendChild(a)}if("id"!=a&&"portada"!=a&&"propietario"!=a&&"propietario_id"!=a){let b=document.createElement("td");b.textContent=d[a],e.appendChild(b)}if("id"==a){let b=document.createElement("td");b.innerHTML=`
                <a style="font-size:0.8em; margin: 1px" class="btn rounded-circle btn-sm btn-primary text-white tooltip-wrapper"
                href="javascript:void(0)" onclick="editar${c}(${d[a]})"
                title="Editar">
                <i class="fa fa-fw fa-edit"></i>
                </a><a style="font-size:0.8em; margin: 1px" class="btn rounded-circle btn-sm btn-danger text-white tooltip-wrapper" 
                href="javascript:void(0)" onclick="eliminar${c}(${d[a]})"
                title="Eliminar">
                <i class="fa fa-fw fa-trash" aria-hidden="true"></i>
                </a>
                </a><a style="font-size:0.8em; margin: 1px" class="btn rounded-circle btn-sm btn-info text-white tooltip-wrapper" 
                href="/inmuebles/${d[a]}"
                title="Detalles">
                <i class="fa fa-fw fa-eye" aria-hidden="true"></i>
                </a>`,e.appendChild(b)}}),b.appendChild(e)})},insertAfter=(a,b)=>{b.parentNode.insertBefore(a,b.nextSibling)};