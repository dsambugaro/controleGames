<?php
    include 'cabecalho.php';
    include 'bd_control/conecta.php';
    include 'bd_control/control.php';

    $campo_pesquisa = nome;
    $table = METODO;
    $key = ID;
    $tableMin = strtolower($table);
    $tratamento = o;
    $rows = lista_tabela_simples($conexao, $table);
?>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>Métodos de Pagamento</h2>
            </div>
            <div class="col-md-6">
                <div class="input-group h2">
                    <input name="busca" class="form-control" id="busca" type="text" placeholder="Pesquisar Métodos">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                </div>
            </div>
            <div class="col-md-3">
                <a href="metodo/metodo_add.php" class="btn btn-primary pull-right h2">Novo Método de Pagamento</a>
            </div>
        </div>
        <hr />
        <?php
            include 'results.php';
        ?>
        <div id="list" class="row text-center">
            <div class="table-responsive col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Método</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="itens">
                        <?php
                            foreach ($rows as $row):
                        ?>
                            <tr>
                                <td><?=$row['nome']?></td>
                                <?php
                                    include 'acoes.php';
                                ?>
                            </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $( "#busca" ).autocomplete({
            source: 'busca.php?campo=<?=$campo_pesquisa?>&table=<?=$table?>',
        });
        $( "#busca" ).on( "autocompleteselect", function( event, ui ) {
            var buscar = ui.item.value;
            $.ajax({
                method: "post",
                url: 'busca.php?campo=<?=$campo_pesquisa?>&table=<?=$table?>',
                data: 'acao=1&key=<?=$key?>&filtro='+buscar,
                dataType: 'html',
                success: function(retorno){
                    var resultado = document.getElementById("itens");
                    console.log(retorno);
                    resultado.innerHTML = retorno;
                }
            });
        })
    </script>

<?php
    include "modal_excluir.php";
    include "rodape.php";
?>
