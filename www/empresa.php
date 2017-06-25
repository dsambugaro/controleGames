<?php
    include "cabecalho.php";
    include 'bd_control/conecta.php';
    include 'bd_control/control.php';
    include 'empresa/empresa_control.php';

    $rows = lista_tabela_simples($conexao, $table);
?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>Empresas</h2>
            </div>
            <div class="col-md-6">
                <div class="input-group h2">
                    <input name="busca" class="form-control" id="busca" type="text" placeholder="Pesquisar Empresas">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                </div>
            </div>
            <div class="col-md-3">
                <a href="empresa/empresa_add.php" class="btn btn-primary pull-right h2">Nova Empresa</a>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6 text-right">
                <input type="radio" id="busca_nome" name="campo" value="nome" checked>
                <label for="busca_nome">Nome</label>
            </div>
            <div class="form-group col-md-6 text-left">
                    <input type="radio" id="busca_cnpj" name="campo" value="CNPJ">
                    <label for="busca_cnpj">CNPJ</label>
            </div>
            <input type="hidden" name="campo_busca" value="nome" id="campo_busca">
        </div>
        <hr />
        <?php
            include 'results.php';
        ?>
        <div id="list" class="row text-center">
            <div class="table-responsive col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">CNPJ</th>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Telefone</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="itens">
                        <?php
                            foreach ($rows as $row):
                        ?>
                        <tr>
                            <td><?=$row['CNPJ']?></td>
                            <td><?=$row['nome']?></td>
                            <td><?=$row['telefone']?></td>
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
