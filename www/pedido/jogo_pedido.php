<script>
    $("#codigo").keypress( function(event){
        $("#codigo").autocomplete({
            source: '../jogo/busca_jogo.php?campo=codigo',
            select: function(event, ui){
                var buscar = ui.item.value;
                retorna_busca(buscar);
            }
        });
    });
    $("#codigo").on("change", function(event){
        var qnt = document.getElementById("quantidade");
        var add = document.getElementById("addJogo");
        if ($(this).val() != $("#cod").val()) {
            $(this).val("");
            titulo.innerHTML = "   ----------   ";
            preco.innerHTML = "  -----  ";
        }
        if ($(this).val() == "") {
            qnt.setAttribute('disabled', true);
        } else {
            qnt.removeAttribute('disabled');
        }
        total_unidade.innerHTML = "  -----  ";
        add.setAttribute('disabled', true);
        qnt.value = "";
    });
    function retorna_busca(buscar){
        $.ajax({
            method: "post",
            url: 'busca_jogo_adicionar.php?campo=codigo',
            data: 'acao=1&filtro='+buscar,
            dataType: 'json',
            success: function(retorno){
                var titulo = document.getElementById("titulo");
                var preco = document.getElementById("preco");
                var codigo = document.getElementById("cod");
                var estoque = document.getElementById("estoque");
                titulo.innerHTML = retorno[0].titulo;
                preco.innerHTML = retorno[0].preco;
                codigo.value = retorno[0].codigo;
                estoque.value = retorno[0].qtd_estoque;
                console.log(retorno[0]);
            }
        });
    }

    function validaQuant(quantidade){
        var estoque = document.getElementById("estoque").value;
        if (quantidade > estoque) {
            return false;
        } else {
            return true;
        }
    }

    $("#quantidade").keyup( function(event){
        var qnt = $(this).val();
        if (validaQuant(qnt)) {
            var preco = document.getElementById("preco").innerHTML;
            var add = document.getElementById("addJogo");
            var total_unidade = document.getElementById("total_unidade");
            total_unidade.innerHTML = ((parseFloat(preco)) * (parseFloat(qnt))).toFixed(2);
        } else {
            alert('Quantidade em estoque é menor que a quantidade digitada!');
            qnt = $(this).val('');
        }
        if (qnt == '') {
            add.setAttribute('disabled', true);
        } else {
            add.removeAttribute('disabled');
        }
    });

    function calculaTotal(){
        var total = document.getElementById("total");
        var frete = document.getElementById("frete");
        var valor_total = document.getElementById("valor_total");
        var soma = (parseFloat(frete.value) + parseFloat((totalJogos())));
        var total_valor = soma ? soma.toFixed(2):(parseFloat((totalJogos()))).toFixed(2);
        total.innerHTML = 'R$ '+total_valor;
        valor_total.value = total_valor;
    }

    function totalJogos() {
        var rows = document.getElementById('listaJogos').getElementsByTagName('tr');
        var last = 0;
        for (row = 0; row < (rows.length); row++) {
            var cells = rows[row].getElementsByTagName('td');
            last = parseFloat(cells[4].innerHTML) + parseFloat(last);
        }
        return last;
    }

    function listaJogos(){
        var rows = document.getElementById("listaJogos").getElementsByTagName("tr");
        var lista = '{';
        var elementos = '';
        var jogos_lista = '';
        for (row = 0; row < rows.length; row++) {
            var cells = rows[row].getElementsByTagName("td");
            elementos += '"'+cells[0].innerHTML+'":'+cells[3].innerHTML+',';
            jogos_lista += cells[0].innerHTML+',';
        }
        jogos_lista = jogos_lista.substr(0,(jogos_lista.length - 1));
        elementos = elementos.substr(0,(elementos.length - 1));
        lista += elementos;
        lista += '}';
        var jogos = document.getElementById("jogos");
        var qnt_jogos = document.getElementById("qnt_jogos");
        jogos.value = jogos_lista;
        qnt_jogos.value = lista;
        console.log(jogos.value);
        console.log(qnt_jogos.value);
        return jogos_lista;
    }
    function valida(){
        if (($("#cliente").val() == "") || ($("#met_pag").val() == "")) {
            alert('Preencha todos os campos!');
            return false;
        } else if (($("#jogos").val() == "")) {
            alert('Não pode haver pedido sem jogos!');
            return false;
        } else {
            $( "form:first" ).submit()
        }
    }
    function add(){
        var codigo = document.getElementById("cod").value;
        var qnt = document.getElementById("quantidade").value;
        $.ajax({
            method: "post",
            url: 'busca_jogo_adicionar.php?campo=codigo',
            data: 'acao=2&quantidade='+qnt+'&filtro='+codigo,
            dataType: 'html',
            success: function(retorno){
                var lista = document.getElementById("listaJogos");
                var codigo = document.getElementById("codigo");
                var jogos_adicionados = document.getElementById("jogos").value;
                if (jogos_adicionados.indexOf(codigo.value) >= 0) {
                    alert('Jogo já adicionado!');
                } else {
                    lista.innerHTML += retorno;
                    console.log(retorno);
                }
                var qnt = document.getElementById("quantidade");
                qnt.value = "";
                qnt.setAttribute('disabled', true);
                calculaTotal();
                listaJogos();
                var titulo = document.getElementById("titulo");
                var preco = document.getElementById("preco");
                var cod = document.getElementById("cod");
                var total = document.getElementById("total_unidade");
                var add = document.getElementById("addJogo");
                codigo.value = "";
                cod.value = "";
                titulo.innerHTML = "----------";
                preco.innerHTML = "-----";
                total.innerHTML = "-----";
                add.setAttribute('disabled', true);
            }
        });
    }
</script>
