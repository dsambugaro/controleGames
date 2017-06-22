<?php
    include 'cabecalho.php';
    include 'bd_control/conecta.php';
    include 'bd_control/control.php';
    include 'funcionario/funcionario_control.php';

    $rows = lista_funcionario($conexao);
?>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>Funcionários</h2>
            </div>
            <div class="col-md-6">
                <div class="input-group h2">
                    <input name="busca" class="form-control" id="busca" type="text" placeholder="Pesquisar Funcionários">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                </div>
            </div>
            <div class="col-md-3">
                <a href="funcionario/funcionario_add.php" class="btn btn-primary pull-right h2">Novo Funcionário</a>
            </div>
        </div>
        <div class="row text-center ">
            <ul class="list-inline">
                <li>
                    <div class="form-group">
                        <input type="radio" id="busca_nome" name="campo" value="nome_pessoa">
                        <label for="busca_nome">Nome</label>
                    </div>
                </li>
                <li>
                    <div class="form-group">
                            <input type="radio" id="busca_cpf" name="campo" value="PESSOA_CPF">
                            <label for="busca_cpf">CPF</label>
                    </div>
                </li>
                <li>
                    <div class="form-group">
                        <input type="radio" id="busca_cad" name="campo" value="cracha" checked>
                        <label for="busca_cad">Cadastro</label>
                    </div>
                </li>
            </ul>
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
                            <th class="text-center">Supervisor</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="itens">
                        <?php
                            foreach ($rows as $row):
                                $supervisor = ($row['supervisor'] == NULL) ? 'Não possui':supervisor_nome($conexao, $row['supervisor']);
                        ?>
                            <tr>
                                <td><?=$row['CPF']?></td>
                                <td><?=$row['nome']?></td>
                                <td><?=$row['cracha']?></td>
                                <td><?=$supervisor?></td>
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
include "busca_com_filtro.php";
include "rodape.php";
?>
