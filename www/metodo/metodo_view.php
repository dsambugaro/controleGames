<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'metodo_control.php';
    $ID = $_POST['view'];
    $table = METODO;
    $row = seleciona_tupla_simples($conexao, $table, $ID);
?>
    <div class="container">
        <div class="row">
            <h3>Método de Pagamento - Visualizar</h3>
        </div>
        <hr />
            <div class="row">
                <div class="form-group col-md-4">
                    <p><strong>Método</strong></p>
                    <p><?=$row['nome']?></p>
                </div>
            </div>
            <br>
            <hr />
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline">
                        <li>
                            <form action="metodo_edit.php" method="post">
                                <input type="hidden" name="edit" value="<?=$row['ID']?>">
                                <button class="btn btn-primary">Editar</button>
                            </form>
                        </li>
                        <li>
                            <a href="../metodo.php" class="btn btn-default">Voltar</a>
                        </li>
                    </ul>
                </div>
            </div>
    </div>
<?php include '../rodape_interno.php'; ?>
