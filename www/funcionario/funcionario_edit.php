<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include '../pessoa/pessoa_control.php';
    include '../supervisor/supervisor_control.php';
    include 'funcionario_control.php';

    $ID = $_POST['edit'];
    $funcionario = seleciona_tupla_funcionario($conexao, $ID);
    $pessoa = seleciona_tupla_pessoa($conexao, 'PESSOA', $ID);
    $endereco = selecionaTuplaEndereco($conexao, $ID);
    $estados = lista_tabela_simples($conexao, $table);
    $url_busca = '../pessoa/busca_pessoa_cidade.php';
    $supervisores = lista_supervisores($conexao);
?>
    <div class="container" onload="checaUsoPessoa()">
        <div class="row">
            <h3>Funcionário - Editar</h3>
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
            <hr />
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="cracha">Cadastro</label>
                    <input type="text" class="form-control" id="cracha" placeholder="Cadastro" name="funcionario_cad" readonly required>
                </div>
                <div class="form-group col-md-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="telefone" placeholder="Telefone com DDD" name="funcionario_telefone" maxlength="11" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="supervisor">Supervisor</label>
                    <select class="form-control" id="supervisor" placeholder="Supervisor" name="supervisor" required>
                        <option value="NULL">Não possui</option>
                        <?php
                            foreach ($supervisores as $supervisor):
                        ?>
                                <option value="<?=$supervisor['FUNCIONARIO_PESSOA_CPF']?>">
                                    <?=$supervisor['nome']?>
                                </option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <hr />

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="../funcionario.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <script>
    $('#telefone').keyup(function () {
        this.value = this.value.replace(/[^0-9]/g,'');
    });

    $("#telefone").val('<?=$funcionario['telefone']?>');
    $("#cracha").val('<?=$funcionario['cracha']?>');
    <?php $sup = ($funcionario['supervisor'] == NULL) ? "NULL":$funcionario['supervisor'] ?>
    $("#supervisor").val('<?=$sup?>');

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
