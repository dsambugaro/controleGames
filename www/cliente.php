<?php
    include 'cabecalho.php';
    include 'bd_control/conecta.php';
    include 'bd_control/control.php';
    include 'cliente/cliente_control.php';
    $rows = lista_cliente($conexao);
?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>Clientes</h2>
            </div>
            <div class="col-md-6">
                <div class="input-group h2">
                    <input name="busca" class="form-control" id="busca" type="text" placeholder="Pesquisar Clientes">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                </div>
            </div>
            <div class="col-md-3">
                <a href="cliente/cliente_add.php" class="btn btn-primary pull-right h2">Novo Cliente</a>
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
                        <input type="radio" id="busca_user" name="campo" value="user" checked>
                        <label for="busca_user">Usuário</label>
                    </div>
                </li>
            </ul>
        </div>
        <hr />
        <?php
            include 'results.php';
        ?>
        <br>
        <div id="list" class="row text-center">
            <div class="table-responsive col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">CPF</th>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Usuário</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="itens">
                        <?php
                            foreach ($rows as $row):
                        ?>
                            <tr>
                                <td><?=$row['PESSOA_CPF']?></td>
                                <td><?=$row['nome']?></td>
                                <td><?=$row['user']?></td>
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
