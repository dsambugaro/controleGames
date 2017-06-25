<?php
    include 'cabecalho.php';
    include 'bd_control/conecta.php';
    include 'bd_control/control.php';
    include 'jogo/jogo_control.php';

    $rows = lista_jogo($conexao);
?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>Jogos</h2>
            </div>
            <div class="col-md-6">
                <div class="input-group h2">
                    <input name="busca" class="form-control" id="busca" type="text" placeholder="Pesquisar Jogos">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                </div>
            </div>
            <div class="col-md-3">
                <a href="jogo/jogo_add.php" class="btn btn-primary pull-right h2">Novo Jogo</a>
            </div>
        </div>
        <div class="row text-center ">
            <ul class="list-inline">
                <li>
                    <div class="form-group">
                        <input type="radio" id="busca_til" name="campo" value="titulo" checked>
                        <label for="busca_til">Título</label>
                    </div>
                </li>
                <li>
                    <div class="form-group">
                            <input type="radio" id="busca_cod" name="campo" value="codigo">
                            <label for="busca_cod">Código</label>
                    </div>
                </li>
                <li>
                    <div class="form-group">
                        <input type="radio" id="busca_empresa" name="campo" value="nome">
                        <label for="busca_empresa">Empresa</label>
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
                            <th class="text-center">Código</th>
                            <th class="text-center">Título</th>
                            <th class="text-center">Lançamento</th>
                            <th class="text-center">Empresa</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="itens">
                        <?php
                            foreach ($rows as $row):
                        ?>
                            <tr>
                                <td><?=$row['codigo']?></td>
                                <td><?=$row['titulo']?></td>
                                <td><?=date('d/m/Y', strtotime($row['lancamento']))?></td>
                                <td><?=$row['nome']?></td>
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
