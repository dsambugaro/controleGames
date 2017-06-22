<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include '../pessoa/pessoa_control.php';
    include 'cliente_control.php';

    $ID = $_POST['edit'];
    $cliente = seleciona_tupla_cliente($conexao, $ID);
    $pessoa = seleciona_tupla_pessoa($conexao, 'PESSOA', $ID);
    $endereco = selecionaTuplaEndereco($conexao, $ID);
    $estados = lista_tabela_simples($conexao, $table);
    $url_busca = '../pessoa/busca_pessoa_cidade.php';
?>
    <div class="container" onload="checaUsoPessoa()">
        <div class="row">
            <h3>Cliente - Editar</h3>
        </div>
        <hr />
        <?php
            include '../results.php';
        ?>
        <br>
        <form action="edit.php" method="post">
            <?php
                include '../pessoa/form_pessoa.php';
            ?>
            <input type="hidden" name="id_antigo" id="id_antigo">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="usuario">Usuário</label>
                    <input type="text" class="form-control" id="usuario" placeholder="Usuário" name="cliente_user" required>
                    <input type="hidden" name="id_user" id="id_user">
                </div>
                <div class="form-group col-md-4">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" placeholder="E-mail válido" name="cliente_email" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" placeholder="Senha" name="cliente_password" required disabled>
                    <input type="hidden" class="form-control" id="senhaCrip" name="senhaCrip">
                </div>
                <div class="form-group col-md-4">
                    <br><br>
                    <input type="radio" value="1" id="change_senha" name="troca_senha" onclick="$('#senha').prop('disabled', false);">
                    <label for="change_senha">Trocar Senha</label>
                    <input type="radio" value="0" id="no_senha" name="troca_senha" onclick="$('#senha').prop('disabled', true)" checked>
                    <label for="no_senha">Manter Senha</label>
                </div>
            </div>
            <hr />

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="../cliente.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <script src="../pessoa_usar.js"></script>
    <script>
        $("#usuario").val('<?=$cliente['user']?>');
        $("#id_user").val('<?=$cliente['usuario']?>');
        $("#senhaCrip").val('<?=$cliente['senha']?>');
        $("#email").val('<?=$cliente['email']?>');

        $("#nome").val('<?=$pessoa['nome_pessoa']?>');
        $("#cpf").val('<?=$pessoa['CPF']?>');
        $("#id_antigo").val('<?=$pessoa['CPF']?>');
        $("#nascimento").val('<?=$pessoa['data_nasc_pessoa']?>');
        $("#logradouro").val('<?=$endereco['logradouro']?>');
        $("#nome_end").val('<?=$endereco['nome']?>');
        $("#num").val(<?=$endereco['numero']?>);
        $("#bairro").val('<?=$endereco['bairro']?>');
        $("#cep").val(<?=$endereco['CEP']?>);
        $("#cidade").val('<?=$endereco['cidade']?>');
        $("#cidade_valida").val('<?=$endereco['cidade']?>');
        $("#id_cidade").val('<?=$endereco['CIDADE_ID']?>');
        var cidade = document.getElementById("cidade");
        cidade.removeAttribute('readonly');

    </script>
<?php
    include '../rodape_interno.php';
?>
