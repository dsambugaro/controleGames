<script>
    $("#codigo").keypress( function(event){
        var empresa = document.getElementById("empresa_selecionada").value;
        $("#codigo").autocomplete({
            source: '../jogo/busca_jogo.php?campo=codigo&empresa='+empresa,
            select: function(event, ui){
                var buscar = ui.item.value;
                retorna_busca(buscar);
            }
        });
    });
    $("#codigo").on("change", function(event){
        var qnt = document.getElementById("quantidade");
        var preco = document.getElementById("preco");
        var add = document.getElementById("addJogo");

        if ($(this).val() != $("#cod").val()) {
            $(this).val("");
            titulo.innerHTML = "   ----------   ";
        }
        if ($(this).val() == "") {
            preco.setAttribute('disabled', true);
            qnt.setAttribute('disabled', true);
            preco.value = "";
            qnt.value = "";
        } else {
            preco.removeAttribute('disabled');
        }
        total_unidade.innerHTML = "  -----  ";
        add.setAttribute('disabled', true);
        preco.value = "";
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
                var codigo = document.getElementById("cod");
                titulo.innerHTML = retorno[0].titulo;
                codigo.value = retorno[0].codigo;
                console.log(retorno[0]);
            }
        });
    }

    $("#preco").on("keyup", function(event){
        var preco = $(this).val();
        var qnt = document.getElementById("quantidade");
        var add = document.getElementById("addJogo");
        var total_unidade = document.getElementById("total_unidade");
        total_unidade.innerHTML = ((parseFloat(preco)) * (parseFloat(qnt.value))).toFixed(2);
        if ($(this).val() == "") {
            qnt.setAttribute('disabled', true);
            add.setAttribute('disabled', true);
            qnt.value = "";
        } else {
            qnt.removeAttribute('disabled');
        }

    });

    $("#quantidade").keyup( function(event){
        var qnt = $(this).val();
        var preco = document.getElementById("preco").value;
        var add = document.getElementById("addJogo");
        var total_unidade = document.getElementById("total_unidade");
        total_unidade.innerHTML = ((parseFloat(preco)) * (parseFloat(qnt))).toFixed(2);
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
        var lista_preco = '{';
        var elementos = '';
        var jogos_lista = '';
        var precos = '';
        for (row = 0; row < rows.length; row++) {
            var cells = rows[row].getElementsByTagName("td");
            elementos += '"'+cells[0].innerHTML+'":'+cells[3].innerHTML+',';
            jogos_lista += cells[0].innerHTML+',';
            precos += '"'+cells[0].innerHTML+'":'+cells[2].innerHTML+',';
        }
        jogos_lista = jogos_lista.substr(0,(jogos_lista.length - 1));
        elementos = elementos.substr(0,(elementos.length - 1));
        lista += elementos;
        lista += '}';
        precos = precos.substr(0,(precos.length - 1));
        lista_preco += precos;
        lista_preco += '}';
        var jogos = document.getElementById("jogos");
        var qnt_jogos = document.getElementById("qnt_jogos");
        var preco_jogos = document.getElementById("preco_jogos");
        jogos.value = jogos_lista;
        qnt_jogos.value = lista;
        preco_jogos.value = lista_preco;
        console.log(jogos.value);
        console.log(qnt_jogos.value);
        console.log(preco_jogos.value);
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
        var preco = document.getElementById("preco").value;
        $.ajax({
            method: "post",
            url: 'busca_jogo_adicionar.php?campo=codigo',
            data: 'acao=2&quantidade='+qnt+'&preco='+preco+'&filtro='+codigo,
            dataType: 'html',
            success: function(retorno){
                var lista = document.getElementById("listaJogos");
                var codigo = document.getElementById("codigo");
                var verifica = document.getElementById("jogos").value;
                if (verifica.indexOf(codigo.value) >= 0) {
                    alert('Jogo já adicionado!');
                } else {
                    lista.innerHTML += retorno;
                    console.log(retorno);
                }
                var qnt = document.getElementById("quantidade");
                var preco = document.getElementById("preco");
                qnt.value = "";
                preco.value = "";
                qnt.setAttribute('disabled', true);
                preco.setAttribute('disabled', true);
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
                total.innerHTML = "-----";
                add.setAttribute('disabled', true);
            }
        });
    }
</script>
