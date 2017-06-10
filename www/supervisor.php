<?php
    include "cabecalho.php";
?>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>Supervisores</h2>
            </div>
            <div class="col-md-6">
                <div class="input-group h2">
                    <input name="busca" class="form-control" id="buscaSupervisores" type="text" placeholder="Pesquisar Supervisores">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>

            <div class="col-md-3">
                <a href="supervisor/supervisor_add.php" class="btn btn-primary pull-right h2">Novo Supervisor</a>
            </div>
        </div>
        <hr />
        <div id="list" class="row text-center">
            <div class="table-responsive col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">CPF</th>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Cadastro</th>
                            <th class="text-center">Usuário</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>999.999.999-99</td>
                            <td>O Senhor é meu pastor e nada me faltará</td>
                            <td>123456789</td>
                            <td>user123456</td>
                            <td class="opcoes">
                                <a class="btn btn-primary btn-xs" href="supervisor/supervisor_view.php">Visualizar</a>
                                <a class="btn btn-warning btn-xs" href="supervisor/supervisor_edit.php">Editar</a>
                                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-confirm">Deletar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>999.999.999-99</td>
                            <td>Tudo posso naquilo que eu acredito</td>
                            <td>123456789</td>
                            <td>user123456</td>
                            <td class="opcoes">
                                <a class="btn btn-primary btn-xs" href="supervisor/supervisor_view.php">Visualizar</a>
                                <a class="btn btn-warning btn-xs" href="supervisor/supervisor_edit.php">Editar</a>
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
