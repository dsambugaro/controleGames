<?php
    include '../cabecalho_interno.php';
    $table = METODO;
    $tableMin = strtolower($table);
    $tratamento = o;
?>
    <div class="container">
        <div class="row">
            <h3>Método de Pagamento - Adicionar</h3>
        </div>
        <hr />
        <?php
            include '../results.php';
        ?>
        <form action="add.php" method="post">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="metodo">Método</label>
                    <input type="text" class="form-control" id="metodo" placeholder="Método" name="metodo_nome" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                    <a href="../metodo.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
<?php include '../rodape_interno.php'; ?>
