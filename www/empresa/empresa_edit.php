<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'empresa_control.php';
    $cnpj = $_POST['edit'];

    $empresa = seleciona_tupla_empresa($conexao, $table, $cnpj);
?>
    <div class="container">
        <div class="row">
            <h3>Empresa - Editar</h3>
        </div>
        <hr />
        <?php include '../results.php'; ?>
        <br>
        <form action="edit.php" method="post">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome"
                    placeholder="Digite o nome" name="empresa_nome"
                    value="<?=$empresa['nome']?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" class="form-control" id="cnpj"
                    placeholder="CNPJ sem pontuação" name="empresa_cnpj" maxlength="14"
                    value="<?=$empresa['CNPJ']?>" required>
                    <input type="hidden" class="form-control" id="old_cnpj"
                    name="cnpj_antigo" maxlength="14"
                    value="<?=$empresa['CNPJ']?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="tel">Telefone</label>
                    <input type="text" class="form-control" id="tel"
                    placeholder="Telefone com DDD" name="empresa_telefone" maxlength="11"
                    value="<?=$empresa['telefone']?>" required>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="../empresa.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        $('#cnpj').keyup(function () {
            this.value = this.value.replace(/[^0-9]/g,'');
        });
        $('#tel').keyup(function () {
            this.value = this.value.replace(/[^0-9]/g,'');
        });
    </script>
<?php include '../rodape_interno.php'; ?>
