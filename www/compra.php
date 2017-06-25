<?php
    include 'cabecalho.php';
    include 'bd_control/conecta.php';
    include 'bd_control/control.php';
    include 'compra/compra_control.php';

    $compras = lista_compra($conexao);
?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>Compras</h2>
            </div>
            <div class="col-md-6">
                <div class="input-group h2">
                    <input name="busca" class="form-control" id="buscaCompras" type="text" placeholder="Pesquisar Compras">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>

            <div class="col-md-3">
                <a href="compra/compra_add.php" class="btn btn-primary pull-right h2">Nova Compra</a>
            </div>
        </div>
        <hr />
        <?php include 'results.php'; ?>
        <div id="list" class="row text-center">
            <div class="table-responsive col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Empresa</th>
                            <th class="text-center">Supervisor</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Data</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="itens">
                        <?php
                            foreach ($compras as $row):
                        ?>
                                <tr>
                                    <td><?=$row['ID']?></td>
                                    <td><?=$row['nome']?></td>
                                    <td><?=$row['user']?></td>
                                    <td>R$ <?=$row['preco_total']?></td>
                                    <td><?=date('d/m/Y', strtotime($row['data']))?></td>
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

<?php
    include "modal_excluir.php";
    include "rodape.php";
?>
