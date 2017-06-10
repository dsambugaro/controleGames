<?php
    include "cabecalho.php";
?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>Pessoas</h2>
            </div>
            <div class="col-md-6">
                <div class="input-group h2">
                    <input name="busca" class="form-control" id="buscaPessoas" type="text" placeholder="Pesquisar Pessoas">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>

            <div class="col-md-3">
                <a href="pessoa/pessoa_add.php" class="btn btn-primary pull-right h2">Nova Pessoa</a>
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
                            <th class="text-center">Nascimento</th>
                            <th class="text-center">Relação</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>999.999.999-99</td>
                            <td>Dolor sit amet consectetur </td>
                            <td>DD/MM/AAA</td>
                            <td>Cliente</td>
                            <td class="opcoes">
                                <a class="btn btn-primary btn-xs" href="pessoa/pessoa_view.php">Visualizar</a>
                                <a class="btn btn-warning btn-xs" href="pessoa/pessoa_edit.php">Editar</a>
                                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-confirm">Deletar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>999.999.999-99</td>
                            <td>Dolor sit amet consectetur </td>
                            <td>DD/MM/AAA</td>
                            <td>Cliente</td>
                            <td class="opcoes">
                                <a class="btn btn-primary btn-xs" href="pessoa/pessoa_view.php">Visualizar</a>
                                <a class="btn btn-warning btn-xs" href="pessoa/pessoa_edit.php">Editar</a>
                                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-confirm">Deletar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>999.999.999-99</td>
                            <td>Dolor sit amet consectetur </td>
                            <td>DD/MM/AAA</td>
                            <td>Funcionário</td>
                            <td class="opcoes">
                                <a class="btn btn-primary btn-xs" href="pessoa/pessoa_view.php">Visualizar</a>
                                <a class="btn btn-warning btn-xs" href="pessoa/pessoa_edit.php">Editar</a>
                                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-confirm">Deletar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>999.999.999-99</td>
                            <td>Dolor sit amet consectetur </td>
                            <td>DD/MM/AAA</td>
                            <td>Funcionário</td>
                            <td class="opcoes">
                                <a class="btn btn-primary btn-xs" href="pessoa/pessoa_view.php">Visualizar</a>
                                <a class="btn btn-warning btn-xs" href="pessoa/pessoa_edit.php">Editar</a>
                                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-confirm">Deletar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>999.999.999-99</td>
                            <td>Dolor sit amet consectetur </td>
                            <td>DD/MM/AAA</td>
                            <td>Cliente | Funcionário</td>
                            <td class="opcoes">
                                <a class="btn btn-primary btn-xs" href="pessoa/pessoa_view.php">Visualizar</a>
                                <a class="btn btn-warning btn-xs" href="pessoa/pessoa_edit.php">Editar</a>
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
