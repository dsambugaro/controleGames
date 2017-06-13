<?php
    include '../cabecalho_interno.php';
    include 'plataforma_control.php';
?>
    <div class="container">
        <div class="row">
            <h3>Plataforma - Adicionar</h3>
        </div>
        <hr />
        <?php
            include '../results.php';
        ?>
        <form action="add.php" method="post">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="plataforma">Plataforma</label>
                    <input type="text" class="form-control" id="plataforma" placeholder="Plataforma" name="plataforma_nome" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" value="adicionar" class="btn btn-primary">
                    <a href="../plataforma.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
<?php include '../rodape_interno.php'; ?>
