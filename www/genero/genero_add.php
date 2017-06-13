<?php
    include '../cabecalho_interno.php';
    $table = GENERO;
    $tableMin = strtolower($table);
    $tratamento = a;
?>
    <div class="container">
        <div class="row">
            <h3>Gênero - Adicionar</h3>
        </div>
        <hr />
        <?php
            include '../results.php';
        ?>
        <form action="add.php" method="post">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="genero">Gênero</label>
                    <input type="text" class="form-control" id="genero" placeholder="Plataforma" name="genero_nome" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" value="adicionar" class="btn btn-primary">
                    <a href="../genero.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
<?php include '../rodape_interno.php'; ?>
