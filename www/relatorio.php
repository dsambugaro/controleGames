<?php
    include "cabecalho.php";
    include 'bd_control/conecta.php';
    include 'bd_control/control.php';

    $estados = lista_tabela_simples($conexao, 'ESTADO');
    $metodos = lista_tabela_simples($conexao, 'METODO');
?>
    <div class="container">
        <div class="row">
            <h2>Relatórios</h2>
        </div>
        <div class="row">
            <select class="form-control" id="relatorio" name="relatorio" required>
                <option value="">Escolha um Relatório</option>
                <option value="1">Jogos mais vendidos entre:</option>
                <option value="2">Clientes que compraram o maior valor entre:</option>
                <option value="3">Clientes que pagaram através de:</option>
                <option value="4">Clientes que não realizaram compras após:</option>
                <option value="5">Clientes que nunca realizaram compras</option>
                <option value="6">Clientes que moram em:</option>
                <option value="7">Empresas que possuem mais jogos cadastrados</option>
                <option value="8">Empresas que possuem mais jogos vendidos</option>
                <option value="9">Supervisores que realizaram compras entre:</option>
                <option value="10">Estados com o maior número de pedidos entre:</option>
            </select>
        </div>
        <hr / >
        <div class="row" id="variaveis">
            <div id="data_intervalo" class="text-center hide">
                <p><strong>Intervalo de data:</strong></p>
                <ul class="list-inline">
                    De
                    <li>
                        <input type="date" id="data1" class="form-control" name="data1" onchange="buscaData($('#relatorio').val());">
                    </li>
                    a
                    <li>
                        <input type="date" id="data2" class="form-control" name="data2" onchange="buscaData($('#relatorio').val());">
                    </li>
                </ul>
            </div>
            <div id="data_unica" class="text-center hide">
                <p><strong>Data:</strong></p>
                <ul class="list-inline">
                    <li>
                        <input type="date" id="data" class="form-control" name="data" onchange="buscaDataUnica($('#relatorio').val());">
                    </li>
                </ul>
            </div>
            <div id="metodo_pagamento" class="text-center hide">
                <ul class="list-inline">
                    <li>
                        <label for="met_pag">Método de Pagamento</label>
                        <select class="form-control" id="met_pag" name="met_pag" onchange="buscaMetPag($('#relatorio').val());">
                            <option value="">Escolha uma método</option>
                            <?php
                                foreach ($metodos as $metodo):
                            ?>
                                    <option value="<?=$metodo['ID']?>"><?=$metodo['nome']?></option>
                            <?php
                                endforeach;
                            ?>
                        </select>
                    </li>
                </ul>
            </div>
            <div id="estado_cidade" class="text-center hide" >
                <ul class="list-inline">
                    <li>
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado" id="estado" onchange="buscaEstadoCidade($('#relatorio').val());">
                            <option value="">Escolha um estado</option>
                            <?php
                                foreach ($estados as $estado):
                                    $selecionado = ($endereco['estado_id'] == $estado['ID']) ? "selected":"";
                            ?>
                                    <option value="<?=$estado['ID']?>" <?=$selecionado?> ><?=$estado['nome']?></option>
                            <?php
                                endforeach;
                            ?>
                        </select>
                    </li>
                    <li>
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" id="cidade" value="" class="form-control" onkeyup="buscaEstadoCidade($('#relatorio').val());">
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div id="list" class="row text-center">
                <div id="resultados">
                    <br><br>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmaDelete(referencia, id){
            $('#delete-confirm').modal({show: true});
            $('#item-deletar').text(referencia);
            $('#id-deletar').val(id);
            console.log(id);
        }
    </script>
    <script>
        $("#relatorio").on("change", function(event){
            $("#data_intervalo").addClass("hide");
            $("#data1").val("");
            $("#data2").val("");
            $("#data_unica").addClass("hide");
            $("#data").val("");
            $("#estado_cidade").addClass("hide");
            $("#estado").val("");
            $("#cidade").val("");
            $("#metodo_pagamento").addClass("hide");
            $("#metodo_pagamento").val("");
            var relatorio = $(this).val();
            var resultado = document.getElementById("resultados");
            resultado.innerHTML = "";

            switch(relatorio) {
                case "1":
                    $("#data_intervalo").removeClass("hide");
                    tete()
                    break;
                case "2":
                    $("#data_intervalo").removeClass("hide");
                    break;
                case "3":
                    $("#metodo_pagamento").removeClass("hide");
                    break;
                case "4":
                    $("#data_unica").removeClass("hide");
                    break;
                case "5":
                    $.ajax({
                        method: "post",
                        url: 'relatorio/relatorio_results.php',
                        data: 'relatorio=5',
                        dataType: 'html',
                        success: function(retorno){
                            var resultado = document.getElementById("resultados");
                            resultado.innerHTML = retorno;
                            console.log(retorno);
                        }
                    });
                    break;
                case "6":
                    $("#estado_cidade").removeClass("hide");
                    break;
                case "7":
                    $.ajax({
                        method: "post",
                        url: 'relatorio/relatorio_results.php',
                        data: 'relatorio=7',
                        dataType: 'html',
                        success: function(retorno){
                            var resultado = document.getElementById("resultados");
                            resultado.innerHTML = retorno;
                            console.log(retorno);
                        }
                    });
                    break;
                case "8":
                    $.ajax({
                        method: "post",
                        url: 'relatorio/relatorio_results.php',
                        data: 'relatorio=8',
                        dataType: 'html',
                        success: function(retorno){
                            var resultado = document.getElementById("resultados");
                            resultado.innerHTML = retorno;
                            console.log(retorno);
                        }
                    });
                    break;
                case "9":
                    $("#data_intervalo").removeClass("hide");
                    break;
                case "10":
                    $("#data_intervalo").removeClass("hide");
                    break;
                default:
            }
        });
        function buscaData(val){
            var data1 = $("#data1").val();
            var data2 = $("#data2").val();
            $.ajax({
                method: "post",
                url: 'relatorio/relatorio_results.php',
                data: 'relatorio='+val+'&data1='+data1+'&data2='+data2,
                dataType: 'html',
                success: function(retorno){
                    var resultado = document.getElementById("resultados");
                    resultado.innerHTML = retorno;
                    console.log(retorno);
                }
            });
        }
        function buscaMetPag(val){
            var met_pag = $("#met_pag").val();
            $.ajax({
                method: "post",
                url: 'relatorio/relatorio_results.php',
                data: 'relatorio='+val+'&metodo='+met_pag,
                dataType: 'html',
                success: function(retorno){
                    var resultado = document.getElementById("resultados");
                    resultado.innerHTML = retorno;
                    console.log(retorno);
                }
            });
        }
        function buscaDataUnica(val){
            var data = $("#data").val();
            $.ajax({
                method: "post",
                url: 'relatorio/relatorio_results.php',
                data: 'relatorio='+val+'&data='+data,
                dataType: 'html',
                success: function(retorno){
                    var resultado = document.getElementById("resultados");
                    resultado.innerHTML = retorno;
                    console.log(retorno);
                }
            });
        }
        function buscaEstadoCidade(val){
            var estado = $("#estado").val();
            var cidade = $("#cidade").val();
            $.ajax({
                method: "post",
                url: 'relatorio/relatorio_results.php',
                data: 'relatorio='+val+'&cidade='+cidade+'&estado='+estado,
                dataType: 'html',
                success: function(retorno){
                    var resultado = document.getElementById("resultados");
                    resultado.innerHTML = retorno;
                    console.log(retorno);
                }
            });
        }
    </script>
<?php
    include "rodape.php";
?>
