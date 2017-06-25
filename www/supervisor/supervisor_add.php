<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include 'supervisor_control.php';
?>
    <div class="container">
        <div class="row">
            <h3>Supervisor - Adicionar</h3>
        </div>
        <hr />
        <form action="add.php" method="post">

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="funcionario_selecionado">Funcionário</label>
                    <input type="text" class="form-control funcionario" id="funcionario_selecionado" placeholder="Cadastro do Funcionário" name="funcionario_selecionado" required>
                </div>
            </div>
            <hr />
            <?php
                include '../results.php';
            ?>
            <br>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="usuario">Usuário</label>
                    <input type="text" class="form-control funcionario" id="usuario" placeholder="Usuário" name="supervisor_user" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control funcionario" id="senha" placeholder="Senha" name="supervisor_password" required>
                </div>
            </div>
            <hr />

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
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
        include '../rodape_interno.php';
    ?>
