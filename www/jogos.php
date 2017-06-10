<?php
    include "cabecalho.php";
?>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>Jogos</h2>
            </div>
            <div class="col-md-6">
                <div class="input-group h2">
                    <input name="busca" class="form-control" id="buscaJogos" type="text" placeholder="Pesquisar Jogos">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>

            <div class="col-md-3">
                <a href="jogos/jogos_add.php" class="btn btn-primary pull-right h2">Novo Jogo</a>
            </div>
        </div>
        <hr />
        <div id="list" class="row text-center">
            <div class="table-responsive col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Código</th>
                            <th class="text-center">Título</th>
                            <th class="text-center">Estoque</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>123456</td>
                            <td>Dolor sit amet consectetur </td>
                            <td>10</td>
                            <td class="opcoes">
                                <a class="btn btn-primary btn-xs" href="jogos/jogos_view.php">Visualizar</a>
                                <a class="btn btn-warning btn-xs" href="jogos/jogos_edit.php">Editar</a>
                                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-confirm">Deletar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>123457</td>
                            <td>Dolor sit amet consectetur </td>
                            <td>1</td>
                            <td class="opcoes">
                                <a class="btn btn-primary btn-xs" href="jogos/jogos_view.php">Visualizar</a>
                                <a class="btn btn-warning btn-xs" href="jogos/jogos_edit.php">Editar</a>
                                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-confirm">Deletar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>123458</td>
                            <td>Dolor sit amet consectetur </td>
                            <td>0</td>
                            <td class="opcoes">
                                <a class="btn btn-primary btn-xs" href="jogos/jogos_view.php">Visualizar</a>
                                <a class="btn btn-warning btn-xs" href="jogos/jogos_edit.php">Editar</a>
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
