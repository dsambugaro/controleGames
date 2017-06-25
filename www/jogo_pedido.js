
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

function listaJogos(){
    var rows = document.getElementById("listaJogos").getElementsByTagName("tr");
    var lista = '{';
    var elementos = '';
    for (row = 0; row < rows.length; row++) {
        var cells = rows[row].getElementsByTagName("td");
        elementos += '"'+cells[0].innerHTML+'":'+cells[3].innerHTML+',';
    }
    var itens = elementos.substr(0,(elementos.length - 1));
    lista += itens;
    lista += '}';
    var jogos = document.getElementById("jogos");
    jogos.value = lista;
}
