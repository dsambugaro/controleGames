<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'pedido_control.php';

    $ID = $_POST['edit'];
    $metodos = lista_tabela_simples($conexao, 'METODO');
    $pedido = seleciona_tupla_pedido($conexao, $ID);
    $jogos = seleciona_jogos_pedido($conexao, $ID);
?>
<script src="../jogo_pedido.js"></script>
<div class="container">
    <br>
    <div class="row">
        <div class="col-md-4">
            <h3>Pedido - Editar</h3>
        </div>
        <div class="col-md-8 text-right">
                <div class="col-md-9 text-right">
                    <p><strong>ID do Pedido</strong></p>
                    <p><?=$pedido['ID']?></p>
                </div>
                <p><strong>Data do pedido</strong></p>
                <p><?=date('d/m/Y', strtotime($pedido['data']))?></p>
        </div>

    </div>
    <hr />
    <form action="edit.php" method="post">
        <input type="hidden" class="form-control" id="ID" name="ID" value="<?=$pedido['ID']?>" required>
        <div class="row">
            <div class="form-group col-md-4">
                <p><strong>Cliente</strong></p>
                <p><?=$pedido['user']?> - <?=$pedido['CLIENTE_PESSOA_CPF']?></p>
            </div>
            <div class="form-group col-md-4">
                <label for="frete">Frete</label>
                <input type="number" step="any" class="form-control" id="frete"
                placeholder="Informe o Frete" min="0" onchange="calculaTotal();" name="frete"
                value="<?=$pedido['frete']?>"
                >
            </div>
            <div class="form-group col-md-4">
                <label for="met_pag">Método de Pagamento</label>
                <select class="form-control" id="met_pag" name="met_pag" required>
                    <option value="">Escolha uma método</option>
                    <?php
                    foreach ($metodos as $metodo):
                    ?>
                        <option value="<?=$metodo['ID']?>"><?=$metodo['nome']?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>
        </div>
        <br><br>
        <input type="hidden" class="form-control" id="jogos" name="jogos" required>
        <input type="hidden" class="form-control" id="jogos_antigo" name="jogos_antigo" required>
        <input type="hidden" class="form-control" id="qnt_jogos" name="qnt_jogos" required>
        <input type="hidden" class="form-control" id="valor_total" name="valor_total" value="<?=$pedido['valor_total']?>" required>
        <input type="hidden" class="form-control" id="estoque" required>
        <div class="row">
            <div class="col-md-12">
                <label for="jogo">Jogos</label>
                <div id="list" class="row text-center">
                    <div class="table-responsive col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Título</th>
                                    <th class="text-center">Preço</th>
                                    <th class="text-center">Quantidade</th>
                                    <th class="text-center">Total Individual</th>
                                    <th class="text-center"></th>
                                </tr>
                                <tr id="adicionarNovo">
                                    <td>
                                        <input type="number" class="form-control" id="codigo" placeholder="Informe o Código">
                                        <input type="hidden" id="cod" name="cod_jogo">
                                    </td>
                                    <td id="titulo">   ----------   </td>
                                    <td id="preco">  -----  </td>
                                    <td>
                                        <input type="number" class="form-control" id="quantidade" min="0" placeholder="Informe a Quantidade" disabled>
                                    </td>
                                    <td id="total_unidade">  -----  </span></td>
                                    <td>
                                        <button type="button" id="addJogo" class="btn btn-sm btn-default"
                                            onclick="add(); return false;" disabled>
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </td>
                                </tr>
                            </thead>
                            <tbody id="listaJogos">
                                <?php
                                    foreach ($jogos as $row):
                                        $preco_total = $row['quantidade'] * $row['preco'];
                                        echo "<tr>";
                                        echo "<td>";
                                        echo "{$row['JOGO_codigo']}";
                                        echo "</td>";
                                        echo "<td>";
                                        echo "{$row['titulo']}";
                                        echo "</td>";
                                        echo "<td>";
                                        echo "{$row['preco']}";
                                        echo "</td>";
                                        echo "<td>";
                                        echo "{$row['quantidade']}";
                                        echo "</td>";
                                        echo "<td>";
                                        echo "{$preco_total}";
                                        echo "</td>";
                                        echo "<td>";
                                        echo "<button type=\"button\" class=\"btn btn-sm btn-danger\" onclick=\"atualizaEstoque({$row['JOGO_codigo']}, {$row['quantidade']});  $(this).closest('tr').remove(); calculaTotal(); listaJogos();\" ><span class=\"glyphicon glyphicon-remove\"></span></button>";
                                        echo "</td>";
                                        echo "</tr>";
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        <div class="row text-right">
            <p><strong>Total</strong></p>
            <p id="total"></p>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <button type="submit" onclick="return valida();" class="btn btn-primary">Salvar</button>
                <a href="../pedido.php" class="btn btn-default" onclick="cancelaAtualizaEstoque();">Cancelar</a>
            </div>
        </div>
    </form>
</div>
<?php include 'jogo_pedido.php'; ?>
<script>
    var controle_1 = '';
    var controle_2 = '';
    var controle_final_1 = '{';
    $("#met_pag").val(<?=$pedido['metodo_pagamento']?>);
    calculaTotal();
    listaJogos();
    $("#jogos_antigo").val(listaJogos());
    console.log($("#jogos_antigo").val());

    function atualizaEstoque(cod, quantidade){
        controle_1 += '"'+cod+'":'+quantidade+',';
        controle_1 = controle_1.substr(0,(controle_1.length - 1));
        controle_2 += cod+',';
        controle_2 = controle_2.substr(0,(controle_2.length - 1));
        console.log('controle_2:');
        console.log(controle_2);
        $.ajax({
            method: "post",
            url: 'atualizaEstoque.php',
            data: 'acao=1&codigo='+cod+'&quantidade='+quantidade,
            dataType: 'html',
            success: function(retorno){
                console.log(retorno);
            }
        });
    }
    function cancelaAtualizaEstoque(){
        controle_final_1 += controle_1;
        controle_final_1 += '}';
        $.ajax({
            method: "post",
            url: 'atualizaEstoque.php',
            data: 'acao=2&codigo='+controle_2+'&quantidade='+controle_final_1,
            dataType: 'html',
            success: function(retorno){
                console.log(retorno);
            }
        });
    }
</script>
<?php
    include '../rodape_interno.php';
?>
