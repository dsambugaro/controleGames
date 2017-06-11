<?php
    include "cabecalho.php";
    include 'bd_control/conecta.php';
    include 'bd_control/control.php';
    include 'empresa/empresa_control.php';
    $table = EMPRESA;
    $key = CNPJ;
    $tableMin = strtolower($table);
    $tratamento = a;
    $rows = lista_tabela_simples($conexao, $table);
?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>Empresas</h2>
            </div>
            <div class="col-md-6">
                <div class="input-group h2">
                    <input name="busca" class="form-control" id="buscaEmpresas" type="text" placeholder="Pesquisar Empresas">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>

            <div class="col-md-3">
                <a href="empresa/empresa_add.php" class="btn btn-primary pull-right h2">Nova Empresa</a>
            </div>
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
                            <th class="text-center">Última compra</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($rows as $row):
                        ?>
                        <tr>
                            <td><?=$row['CNPJ']?></td>
                            <td><?=$row['nome']?></td>
                            <td><?=date('d/m/Y', strtotime($row['ultima_compra']))?></td>
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
