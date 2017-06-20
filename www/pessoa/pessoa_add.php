<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'pessoa_control.php';

?>
    <div class="container">
        <div class="row">
            <h3>Pessoa - Adicionar</h3>
        </div>
        <hr />
        <?php
            include '../results.php';
        ?>
        <form action="add.php" method="post">
            <?php include 'form_pessoa.php'; ?>
            <hr />

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                    <a href="../pessoa.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
<?php
    include '../rodape_interno.php';
?>
