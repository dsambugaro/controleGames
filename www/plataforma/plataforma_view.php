<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'plataforma_control.php';
    $ID = $_POST['view'];
    $table = PLATAFORMA;
    $row = seleciona_tupla_simples($conexao, $table, $ID);
?>
    <div class="container">
        <div class="row">
            <h3>Plataforma - Visualizar</h3>
        </div>
        <hr />
            <div class="row">
                <div class="form-group col-md-6">
                    <p><strong>Nome</strong></p>
                    <p><?= $row['nome']?></p>
                </div>
            </div>
            <br>
            <hr />
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline">
                        <li>
                            <form action="plataforma_edit.php" method="post">
                                <input type="hidden" name="edit" value="<?=$row['ID']?>">
                                <button class="btn btn-primary">Editar</button>
                            </form>
                        </li>
                        <li>
                            <a href="../plataforma.php" class="btn btn-default">Voltar</a>
                        </li>
                    </ul>
                </div>
            </div>
    </div>
<?php include '../rodape_interno.php'; ?>
