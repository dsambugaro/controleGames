<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include '../pessoa/pessoa_control.php';
    include 'funcionario_control.php';

    $ID = $_POST['view'];

    $funcionario = seleciona_tupla_funcionario($conexao, $ID);
    $pessoa = seleciona_tupla_pessoa($conexao, 'PESSOA', $ID);
    $endereco = selecionaTuplaEndereco($conexao, $ID);
    $sup = $funcionario['supervisor'];
    $supervisor = ($sup == NULL) ? 'Não possui':supervisor_nome($conexao, $sup);
?>
    <div class="container">
        <div class="row">
            <h3>Funcionário - Visualizar</h3>
        </div>
        <hr />
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Nome</strong></p>
                    <p><?=$pessoa['nome_pessoa']?></p>
                </div>
                <div class="form-group col-md-4">
                    <p><strong>CPF</strong></p>
                    <p><?=$pessoa['CPF']?></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Nascimento</strong></p>
                    <p><?=date('d/m/Y', strtotime($pessoa['data_nasc_pessoa']))?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
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
                    <p><strong>Cadastro</strong></p>
                    <p><?=$funcionario['cracha']?></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Telefone</strong></p>
                    <p><?=$funcionario['telefone']?></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Supervisor</strong></p>
                    <p><?=$supervisor?></p>
                </div>
            </div>
            <hr />

            <div class="row">
                <ul class="list-inline">
                    <li>
                        <form action="funcionario_edit.php" method="post">
                            <input type="hidden" name="edit" value="<?=$pessoa['CPF']?>">
                            <button class="btn btn-primary">Editar</button>
                        </form>
                    </li>
                    <li>
                        <a href="../funcionario.php" class="btn btn-default">Voltar</a>
                    </li>
                </ul>
            </div>
    </div>
    <?php
        include '../modal_excluir.php';
        include '../rodape_interno.php';
    ?>
