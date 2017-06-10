<?php
    include "cabecalho.php";
?>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>Métodos de Pagamento</h2>
            </div>
            <div class="col-md-6">
                <div class="input-group h2">
                    <input name="busca" class="form-control" id="buscaMetodo" type="text" placeholder="Pesquisar Métodos">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>

            <div class="col-md-3">
                <a href="metodo/metodo_add.php" class="btn btn-primary pull-right h2">Novo Método de Pagamento</a>
            </div>
        </div>
        <hr />
        <div id="list" class="row text-center">
            <div class="table-responsive col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Método</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Boleto</td>
                            <td class="opcoes">
                                <a class="btn btn-primary btn-xs" href="metodo/metodo_view.php">Visualizar</a>
                                <a class="btn btn-warning btn-xs" href="metodo/metodo_edit.php">Editar</a>
                                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-confirm">Deletar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Deposito Bancário</td>
                            <td class="opcoes">
                                <a class="btn btn-primary btn-xs" href="metodo/metodo_view.php">Visualizar</a>
                                <a class="btn btn-warning btn-xs" href="metodo/metodo_edit.php">Editar</a>
                                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-confirm">Deletar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Cartão de Crédito</td>
                            <td class="opcoes">
                                <a class="btn btn-primary btn-xs" href="metodo/metodo_view.php">Visualizar</a>
                                <a class="btn btn-warning btn-xs" href="metodo/metodo_edit.php">Editar</a>
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
