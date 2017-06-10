<?php
    include "cabecalho.php";
?>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>Pedidos</h2>
            </div>
            <div class="col-md-6">
                <div class="input-group h2">
                    <input name="busca" class="form-control" id="buscaPedidos" type="text" placeholder="Pesquisar Pedidos">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>

            <div class="col-md-3">
                <a href="pedido/pedido_add.php" class="btn btn-primary pull-right h2">Novo Pedido</a>
            </div>
        </div>
        <hr />
        <div id="list" class="row text-center">
            <div class="table-responsive col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Cliente</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Data</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>123</td>
                            <td>user123456</td>
                            <td>R$ 999,99</td>
                            <td>DD/MM/AAAA</td>
                            <td class="opcoes">
                                <a class="btn btn-primary btn-xs" href="pedido/pedido_view.php">Visualizar</a>
                                <a class="btn btn-warning btn-xs" href="pedido/pedido_edit.php">Editar</a>
                                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-confirm">Deletar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>123</td>
                            <td>user123456</td>
                            <td>R$ 999,99</td>
                            <td>DD/MM/AAAA</td>
                            <td class="opcoes">
                                <a class="btn btn-primary btn-xs" href="pedido/pedido_view.php">Visualizar</a>
                                <a class="btn btn-warning btn-xs" href="pedido/pedido_edit.php">Editar</a>
                                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-confirm">Deletar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>123</td>
                            <td>user123456</td>
                            <td>R$ 999,99</td>
                            <td>DD/MM/AAAA</td>
                            <td class="opcoes">
                                <a class="btn btn-primary btn-xs" href="pedido/pedido_view.php">Visualizar</a>
                                <a class="btn btn-warning btn-xs" href="pedido/pedido_edit.php">Editar</a>
                                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-confirm">Deletar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    
<?php
    include "modal_excluir.php";
    include "rodape.php";
?>
