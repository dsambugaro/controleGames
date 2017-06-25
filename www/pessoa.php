<?php
    include 'cabecalho.php';
    include 'bd_control/conecta.php';
    include 'bd_control/control.php';
    include 'pessoa/pessoa_control.php';

    $rows = lista_tabela_simples($conexao, $table);

?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>Pessoas</h2>
            </div>
            <div class="col-md-6">
                <div class="input-group h2">
                    <input name="busca" class="form-control" id="busca" type="text" placeholder="Pesquisar Pessoas">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                </div>
            </div>
            <div class="col-md-3">
                <a href="pessoa/pessoa_add.php" class="btn btn-primary pull-right h2">Nova Pessoa</a>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6 text-right">
                <input type="radio" id="busca_nome" name="campo" value="nome_pessoa" checked>
                <label for="busca_nome">Nome</label>
            </div>
            <div class="form-group col-md-6 text-left">
                    <input type="radio" id="busca_cpf" name="campo" value="CPF">
                    <label for="busca_cpf">CPF</label>
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
                            <th class="text-center">Nascimento</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="itens">
                        <?php
                            foreach ($rows as $row):
                        ?>
                                <tr>
                                    <td><?=$row['CPF']?></td>
                                    <td><?=$row['nome_pessoa']?></td>
                                    <td><?=date('d/m/Y', strtotime($row['data_nasc_pessoa']))?></td>
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
