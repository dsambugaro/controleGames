<?php
    include '../cabecalho_interno.php';
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include 'supervisor_control.php';

    $ID = $_POST['edit'];
    $supervisor = seleciona_tupla_supervisor($conexao, $ID);
?>
    <div class="container">
        <div class="row">
            <h3>Supervisor - Editar</h3>
        </div>
        <hr />
        <form action="edit.php" method="post">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="funcionario_selecionado">Funcionário</label>
                    <input type="text" class="form-control funcionario" id="funcionario_selecionado"
                        placeholder="Cadastro do Funcionário" name="funcionario_selecionado"
                        value="<?=$supervisor['cracha']?>" required
                    >
                    <input type="hidden" name="cpf" id="cpf" value="<?=$supervisor['FUNCIONARIO_PESSOA_CPF']?>" required>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="usuario">Usuário</label>
                    <input type="text" class="form-control funcionario" id="usuario"
                        placeholder="Usuário" name="supervisor_user"
                        value="<?=$supervisor['user']?>" required
                    >
                    <input type="hidden" name="id_user" id="id_user" value="<?=$supervisor['usuario']?>" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" placeholder="Senha" name="cliente_password" required disabled>
                    <input type="hidden" class="form-control" id="senhaCrip" name="senhaCrip" value="<?=$supervisor['senha']?>">
                </div>
                <div class="form-group col-md-4">
                    <br><br>
                    <input type="radio" value="1" id="change_senha" name="troca_senha" onclick="$('#senha').prop('disabled', false);">
                    <label for="change_senha">Trocar Senha</label>
                    <input type="radio" value="0" id="no_senha" name="troca_senha" onclick="$('#senha').prop('disabled', true); $('#senha').val('');" checked>
                    <label for="no_senha">Manter Senha</label>
                </div>
            </div>
            <hr />

            <div class="row">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="../supervisor.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        $("#funcionario_selecionado").keypress( function(event){
            $( "#funcionario_selecionado" ).autocomplete({
                source: '../busca.php?campo=cracha&table=FUNCIONARIO',
            });
        });
        $( "#funcionario_selecionado" ).on( "autocompleteselect", function( event, ui ) {
            var buscar = ui.item.value;
            $("#funcionario_selecionado").val(buscar);
        });
    </script>

    <?php
        include '../modal_excluir.php';
        include '../rodape_interno.php';
    ?>
