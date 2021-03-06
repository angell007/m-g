const drawTable = async (models, $body, entidad) => {

    console.log(models);

    models.forEach((model) => {

        const $tr = document.createElement("tr");
        Object.keys(models[0]).forEach((key, index) => {

            if (index == 0) {
                let $cell = document.createElement("td");
                $cell.textContent = model['propietario']['identificacion'];
                $tr.appendChild($cell);
            }

            if (key != 'id' && key != 'portada' && key != 'propietario' && key != 'propietario_id') {
                let $cell = document.createElement("td");
                $cell.textContent = model[key];
                $tr.appendChild($cell);
            }

            if (key == 'id') {
                let $cell = document.createElement("td");
                $cell.innerHTML = `
                <a style="font-size:0.8em; margin: 1px" class="btn rounded-circle btn-sm btn-primary text-white tooltip-wrapper"
                href="javascript:void(0)" onclick="editar${entidad}(${model[key]})"
                title="Editar">
                <i class="fa fa-fw fa-edit"></i>
                </a><a style="font-size:0.8em; margin: 1px" class="btn rounded-circle btn-sm btn-danger text-white tooltip-wrapper" 
                href="javascript:void(0)" onclick="eliminar${entidad}(${model[key]})"
                title="Eliminar">
                <i class="fa fa-fw fa-trash" aria-hidden="true"></i>
                </a>
                </a><a style="font-size:0.8em; margin: 1px" class="btn rounded-circle btn-sm btn-info text-white tooltip-wrapper" 
                href="/inmuebles/${model[key]}"
                title="Detalles">
                <i class="fa fa-fw fa-eye" aria-hidden="true"></i>
                </a>`

                $tr.appendChild($cell);
            }
        })

        $body.appendChild($tr);
    });
}

const insertAfter = (newNode, existingNode) => {
    existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
}