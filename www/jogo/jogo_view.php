<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include '../empresa/empresa_control.php';
    include 'jogo_control.php';

    $codigo = $_POST['view'];
    $jogo = seleciona_tupla_jogo($conexao, $codigo);
    $plataforma = seleciona_tupla_simples($conexao, 'PLATAFORMA', $jogo['plataforma']);
    $genero = seleciona_tupla_simples($conexao, 'GENERO', $jogo['genero']);
    $empresa = seleciona_tupla_empresa($conexao, 'EMPRESA', $jogo['EMPRESA_CNPJ']);
?>
    <div class="container">
        <div class="row">
            <h3>Jogo - Visualizar</h3>
        </div>
        <hr />
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Título</strong></p>
                    <p><?=$jogo['titulo']?></p>
                </div>
                <div class="form-group col-md-4">
                    <p><strong>Código</strong></p>
                    <p><?=$jogo['codigo']?></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Lançamento</strong></p>
                    <p><?=date('d/m/Y', strtotime($jogo['lancamento']))?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Plataforma</strong></p>
                    <p><?=$plataforma['nome']?></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Gênero</strong></p>
                    <p><?=$genero['nome']?></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Faixa Etária</strong></p>
                    <p><?=$jogo['faixa_etaria']?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Preço</strong></p>
                    <p>R$ <?=$jogo['preco']?></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Quantidade em estoque</strong></p>
                    <p><?=$jogo['qtd_estoque']?></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Empresa</strong></p>
                    <p><?=$empresa['nome']?></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-10">
                    <p><strong>Sinopse</strong></p>
                    <p><?=$jogo['sinopse']?></p>
                </div>
            </div>

            <br>
            <hr />

            <div class="row">
                <ul class="list-inline">
                    <li>
                        <form action="jogo_edit.php" method="post">
                            <input type="hidden" name="edit" value="<?=$jogo['codigo']?>">
                            <button class="btn btn-primary">Editar</button>
                        </form>
                    </li>
                    <li>
                        <a href="../jogo.php" class="btn btn-default">Voltar</a>
                    </li>
                </ul>
            </div>
    </div>
<?php include '../rodape_interno.php'; ?>
