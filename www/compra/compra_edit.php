<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'compra_control.php';

    $ID = $_POST['edit'];
    $compra = seleciona_tupla_compra($conexao, $ID);
    $jogos = seleciona_jogos_compra($conexao, $ID);
?>
<script src="../jogo_compra.js"></script>
<div class="container">
    <br>
    <div class="row">
        <div class="col-md-4">
            <h3>Compra - Editar</h3>
        </div>
        <div class="col-md-8 text-right">
                <div class="col-md-9 text-right">
                    <p><strong>ID da Compra</strong></p>
                    <p><?=$compra['ID']?></p>
                </div>
                <p><strong>Data do compra</strong></p>
                <p><?=date('d/m/Y', strtotime($compra['data']))?></p>
        </div>

    </div>
    <hr />
    <form action="edit.php" method="post">
        <input type="hidden" class="form-control" id="ID" name="ID" value="<?=$compra['ID']?>" required>
        <div class="row">
            <div class="form-group col-md-4">
                <p><strong>Supervisor</strong></p>
                <p><?=$compra['user']?> - <?=$compra['FUNCIONARIO_PESSOA_CPF']?></p>
            </div>
            <div class="form-group col-md-4">
                <p><strong>Empresa</strong></p>
                <p><?=$compra['nome']?></p>
            </div>
        </div>
        <br><br>
        <input type="hidden" class="form-control" id="jogos" name="jogos" required>
        <input type="hidden" class="form-control" id="empresa_selecionada" name="empresa" value="<?=$compra['EMPRESA_CNPJ']?>" required>
        <input type="hidden" class="form-control" id="jogos_antigo" name="jogos_antigo" required>
        <input type="hidden" class="form-control" id="preco_jogos" name="preco_jogos" required>
        <input type="hidden" class="form-control" id="qnt_jogos" name="qnt_jogos" required>
        <input type="hidden" class="form-control" id="valor_total" name="valor_total" value="<?=$compra['valor_total']?>" required>
        <input type="hidden" class="form-control" id="frete" name="frete" value="0" required>
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
                                    <td>
                                        <input type="number" class="form-control" id="preco" min="0" placeholder="Informe o preco" disabled>
                                    </td>
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
                                        echo "<button type=\"button\" class=\"btn btn-sm btn-danger\" onclick=\"$(this).closest('tr').remove(); calculaTotal(); listaJogos();\" value=\"X\"><span class=\"glyphicon glyphicon-remove\"></span></button>";
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
                <a href="../compra.php" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </form>
</div>
<?php include 'jogo_pedido.php'; ?>
<script>
    calculaTotal();
    listaJogos();
    $("#jogos_antigo").val(listaJogos());
    console.log($("#jogos_antigo").val());
</script>
<?php
    include '../rodape_interno.php';
?>
