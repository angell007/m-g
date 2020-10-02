const drawTable = async (models, $body,entidad) => {

    models.forEach((model) => {

        const $tr = document.createElement("tr");
        Object.keys(models[0]).forEach((key) => {
            if (key != 'id' && key != 'tipo_identificacion') {
                let $cell = document.createElement("td");
                $cell.textContent = model[key];
                $tr.appendChild($cell);
            }
            if (key == 'id') {
                let $cell = document.createElement("td");
                $cell.innerHTML = `
                <a class="btn rounded-circle btn-sm btn-primary text-white tooltip-wrapper"
                href="javascript:void(0)" onclick="editar${entidad}(${model[key]})"
                title="Editar">
                <i class="fa fa-fw fa-edit"></i>
                </a><a class="btn rounded-circle btn-sm btn-danger text-white tooltip-wrapper" 
                href="javascript:void(0)" onclick="eliminar${entidad}(${model[key]})"
                title="Eliminar">
                <i class="fa fa-fw fa-trash" aria-hidden="true"></i>
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