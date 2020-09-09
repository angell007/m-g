let arrendatario = new Array();

window.onload = async () => {
    await getData();
}

async function getData() {
    try {
        const response = await axios.get('/arrendatarios');
        this.arrendatario = await response.data
        await addTable()
        $('#dataTable').DataTable({
            "pagingType": "full_numbers"
        });
        console.log(document.getElementById("dataTable"));
    } catch (error) {
        console.error(error);
    }
}

async function addTable() {
    var myTableDiv = document.getElementById("myDynamicTable");

    var table = document.createElement('TABLE');
    table.border = '1';
    table.setAttribute('id', 'dataTable')


    var THEAD = document.createElement('THEAD');

    for (var i = 0; i < 1; i++) {
        var tr = document.createElement('TR');
        THEAD.appendChild(tr);

        for (var j = 0; j < 4; j++) {
            var td = document.createElement('TD');
            td.width = '75';
            td.appendChild(document.createTextNode("Cell " + i + "," + j));
            tr.appendChild(td);
        }
    }

    table.appendChild(THEAD);


    var tableBody = document.createElement('TBODY');
    table.appendChild(tableBody);

    for (var i = 0; i < 3; i++) {
        var tr = document.createElement('TR');
        tableBody.appendChild(tr);

        for (var j = 0; j < 4; j++) {
            var td = document.createElement('TD');
            td.width = '75';
            td.appendChild(document.createTextNode("Cell " + i + "," + j));
            tr.appendChild(td);
        }
    }
    myTableDiv.appendChild(table);
}

