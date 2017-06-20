<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'pessoa_control.php';
    $cpf = $_POST['view'];
    $row = seleciona_tupla_pessoa($conexao, $table, $cpf);
    $endereco = selecionaTuplaEndereco($conexao, $cpf);
    $estados = lista_tabela_simples($conexao, $table);
?>
    <div class="container">
        <div class="row">
            <h3>Pessoa - Visualizar</h3>
        </div>
        <hr />
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Nome</strong></p>
                    <p><?=$row['nome_pessoa']?></p>
                </div>
                <div class="form-group col-md-4">
                    <p><strong>CPF</strong></p>
                    <p><?=$row['CPF']?></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Nascimento</strong></p>
                    <p><?=date('d/m/Y', strtotime($row['data_nasc_pessoa']))?></p>
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
            <hr />

            <div class="row">
                <div class="col-md-8">
                    <a href="pessoa_edit.php" class="btn btn-primary">Editar</a>
                    <a href="../pessoa.php" class="btn btn-default">Voltar</a>
                </div>
            </div>
    </div>
    <?php
        include '../rodape_interno.php';
    ?>
