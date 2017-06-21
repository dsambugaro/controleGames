<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include '../pessoa/pessoa_control.php';
    include 'cliente_control.php';

    $ID = $_POST['view'];
    $pessoa = seleciona_tupla_pessoa($conexao, 'PESSOA', $ID);
    $endereco = selecionaTuplaEndereco($conexao, $ID);
    $cliente = seleciona_tupla_cliente($conexao, $ID);

?>
    <div class="container">
        <div class="row">
            <h3>Cliente - Visualizar</h3>
        </div>
        <hr />
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Nome</strong></p>
                    <p><?=$pessoa['nome_pessoa']?></p>
                </div>
                <div class="form-group col-md-4">
                    <p><strong>CPF</strong></p>
                    <p><?=$cliente['PESSOA_CPF']?></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Nascimento</strong></p>
                    <p><?=date('d/m/Y', strtotime($pessoa['data_nasc_pessoa']))?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p><strong>Endereço</strong></p>
                    <p><?=$endereco['logradouro']?> <?=$endereco['nome']?>, <?=$endereco['numero']?> - <?=$endereco['bairro']?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>CEP</strong></p>
                    <p><?=$endereco['CEP']?></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Cidade</strong></p>
                    <p><?=$endereco['cidade']?></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Estado</strong></p>
                    <p><?=$endereco['estado']?></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Usuário</strong></p>
                    <p><?=$cliente['user']?></p>
                </div>
                <div class="col-md-4">
                    <p><strong>E-mail</strong></p>
                    <p><?=$cliente['email']?></p>
                </div>
            </div>
            <hr />

            <div class="row">
                <div class="col-md-8">
                    <a href="cliente_edit.php" class="btn btn-primary">Editar</a>
                    <a href="../cliente.php" class="btn btn-default">Voltar</a>
                </div>
            </div>
    </div>
    <?php
        include '../rodape_interno.php';
    ?>
