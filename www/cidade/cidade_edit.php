<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'cidade_control.php';

    $table = ESTADO;
    $ID = $_POST['edit'];
    $row = selecionaTuplaCidade($conexao, $ID);
    $estados = lista_tabela_simples($conexao, $table);
?>
    <div class="container">
        <div class="row">
            <h3>Cidade - Editar</h3>
        </div>
        <hr />
        <br>
        <form action="edit.php" method="post">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade"
                        placeholder="Cidade" name="cidade_nome"
                        value="<?=$row['nome']?>" required
                    >
                    <input type="hidden" class="form-control"
                        placeholder="Cidade" name="id"
                        value="<?=$row['ID']?>"
                    >
                </div>
                <div class="form-group col-md-6">
                    <label for="estado">Estado</label>
                    <select class="form-control" name="estado" id="estado" required>
                        <?php
                            foreach ($estados as $estado):
                                $selecionado = ($row['ESTADO_ID'] == $estado['ID']) ? "selected":"";
                        ?>
                                <option value="<?=$estado['ID']?>" <?=$selecionado?> ><?=$estado['nome']?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <input type="submit" value="Salvar" class="btn btn-primary">
                    <a href="../cidade.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
            </div>
        </form>
    </div>

    <?php
        include '../rodape_interno.php';
    ?>
