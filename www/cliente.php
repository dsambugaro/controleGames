<?php
    include 'cabecalho.php';
    include 'bd_control/conecta.php';
    include 'bd_control/control.php';
    include 'cliente/cliente_control.php';
    $rows = lista_cliente($conexao, $table);
?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>Clientes</h2>
            </div>
            <div class="col-md-6">
                <div class="input-group h2">
                    <input name="busca" class="form-control" id="buscaClientes" type="text" placeholder="Pesquisar Clientes">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>

            <div class="col-md-3">
                <a href="cliente/cliente_add.php" class="btn btn-primary pull-right h2">Novo Cliente</a>
            </div>
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
    include "rodape.php";
?>
