<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'metodo_control.php';

    $ID = $_POST['edit'];
    $row = seleciona_tupla_simples($conexao, $table, $ID);
?>
    <div class="container">
        <div class="row">
            <h3>Método de Pagamento - Editar</h3>
        </div>
        <hr />
        <form action="edit.php" method="post">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="metodo">Método</label>
                    <input type="text" class="form-control" id="metodo_nome"
                            placeholder="Método" name="metodo_nome"
                            value="<?=$row['nome']?>" required
                    >
                    <input type="hidden" class="form-control" id="metodo_id"
                            placeholder="ID do metodo" name="metodo_id"
                            value="<?=$row['ID']?>"
                    >
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="../metodo.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <?php
        include '../rodape_interno.php.php';
    ?>
