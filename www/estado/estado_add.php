<?php
    include '../cabecalho_interno.php';
    include 'estado_control.php';
?>
    <div class="container">
        <div class="row">
            <h3>Estado - Adicionar</h3>
        </div>
        <hr />
        <?php
            include '../results.php';
        ?>
        <form action="add.php" method="post">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" id="estado" placeholder="Estado" name="estado_nome" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" value="adicionar" class="btn btn-primary">
                    <a href="../estado.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
<?php include '../rodape_interno.php'; ?>
