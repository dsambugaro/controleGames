<?php
    include '../cabecalho_interno.php';
    include 'usuario_control.php';
?>
    <div class="container">
        <div class="row">
            <h3>Usuário - Adicionar</h3>
        </div>
        <hr />
        <?php
            include '../results.php';
        ?>
        <form action="add.php" method="post">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="usuario">Usuário</label>
                    <input type="text" class="form-control" id="usuario" placeholder="Usuário" name="usuario_nome" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" placeholder="Senha" name="usuario_senha" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" value="adicionar" class="btn btn-primary">
                    <a href="../usuario.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
<?php include '../rodape_interno.php'; ?>
