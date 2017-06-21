<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'pessoa_control.php';
    $cpf = $_POST['edit'];
    $pessoa = seleciona_tupla_pessoa($conexao, $table, $cpf);
    $endereco = selecionaTuplaEndereco($conexao, $cpf);
    $estados = lista_tabela_simples($conexao, $table);
    $url_busca = 'busca_pessoa_cidade.php';
?>
    <div class="container">
        <div class="row">
            <h3>Pessoa - Editar</h3>
        </div>
        <hr />
        <form action="edit.php" method="post">
            <?php
                include 'form_pessoa.php';
            ?>
            <input type="hidden" name="id_antigo" id="id_antigo">
            <hr />
            <div class="row">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="../pessoa.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function(){
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

        });
    </script>

<?php
    include '../modal_excluir.php';
    include '../rodape_interno.php';
?>
