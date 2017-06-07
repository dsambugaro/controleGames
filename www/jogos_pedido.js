function addJogo() {
    var cod = document.getElementById("codigo");
    var quant = document.getElementById("quantidade");
    var table = document.getElementById("listaJogos");
    var newRow = document.createElement('tr');
    newRow.insertCell(0).innerHTML = cod.value;
    newRow.insertCell(1).innerHTML = titleJogo(cod.value);
    newRow.insertCell(2).innerHTML = precoJogo(cod.value);
    newRow.insertCell(3).innerHTML = quant.value;
    newRow.insertCell(4).innerHTML = (precoJogo(cod.value)) * quant.value;
    table.appendChild(newRow);
    cod.value = "";
    quant.value = "";
    calculaTotal();
}

function titleJogo(cod){
    if (cod == 123456) {
        return "Dolor sit amet consectetur";
    } else {
        return "Lorem Ipsum";
    }
}

function precoJogo(cod){
    if (cod == 123456) {
        return 20;
    } else {
        return 50;
    }
}

function calculaTotal(){
    var total = document.getElementById("total");
    var frete = document.getElementById("frete");
    var soma = (parseFloat(frete.value) + parseFloat((totalJogos())));
    total.innerHTML = soma ? soma:(parseFloat((totalJogos())));
}

function totalJogos() {
    var rows = document.getElementById("listaJogos").getElementsByTagName("tr");
    var last = 0;
    for (row = 0; row < rows.length; row++) {
        var cells = rows[row].getElementsByTagName("td");
        last = parseFloat(cells[4].innerHTML) + parseFloat(last);
    }
    return last;
}
