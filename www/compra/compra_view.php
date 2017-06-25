<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'pedido_control.php';

    $ID = $_POST['view'];
    $pedido = seleciona_tupla_pedido($conexao, $ID);
    $metodo = seleciona_tupla_simples($conexao, 'METODO', $pedido['metodo_pagamento']);
    $jogos = seleciona_jogos_pedido($conexao, $ID);
?>
    <div class="container">
        <div class="row">
            <h3>Pedido - Visualizar</h3>
        </div>
        <hr />
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Cliente</strong></p>
                    <p><?=$pedido['user']?></p>
                </div>
                <div class="form-group col-md-4">
                    <p><strong>ID Pedido</strong></p>
                    <p><?=$pedido['ID']?></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Data</strong></p>
                    <p><?=date('d/m/Y', strtotime($pedido['data']))?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Valor Frete</strong></p>
                    <p>R$ <?=$pedido['frete']?></p>
                </div>
                <div class="col-md-4">
                        <p><strong>Valor Total</strong></p>
                        <p id="total">R$ <?=$pedido['valor_total']?></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Método de Pagamento</strong></p>
                    <p><?=$metodo['nome']?></p>
                </div>
            </div>
            <br><br>
            <div id="list" class="row text-center">
                <p><strong>Jogos no pedido</strong></p>
                <div class="table-responsive col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Código</th>
                                <th class="text-center">Título</th>
                                <th class="text-center">Preço</th>
                                <th class="text-center">Quantidade</th>
                                <th class="text-center">Total Individual</th>
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
                                    echo "</tr>";
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br><br>
            <hr />
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline">
                        <li>
                            <form action="pedido_edit.php" method="post">
                                <input type="hidden" name="edit" value="<?=$pedido['ID']?>">
                                <button class="btn btn-primary">Editar</button>
                            </form>
                        </li>
                        <li>
                            <a href="../pedido.php" class="btn btn-default">Voltar</a>
                        </li>
                    </ul>
                </div>
            </div>
    </div>
<?php include '../rodape_interno.php'; ?>
