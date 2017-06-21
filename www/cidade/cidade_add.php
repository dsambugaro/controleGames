<?php
    include '../cabecalho_interno.php';
    include 'cidade_control.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    $table = ESTADO;
    $rows = lista_tabela_simples($conexao, $table);
?>
    <div class="container">
        <div class="row">
            <h3>Cidade - Adicionar</h3>
        </div>
        <hr />
        <?php
            include '../results.php';
        ?>
        <form action="add.php" method="post">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" placeholder="Cidade" name="cidade_nome" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="estado">Estado</label>
                    <select class="form-control" name="estado" id="estado" required>
                        <option value="0">Escolha um estado</option>
                        <?php
                            foreach ($rows as $row):
                        ?>
                                <option value="<?=$row['ID']?>"><?=$row['nome']?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" value="adicionar" class="btn btn-primary">
                    <a href="../cidade.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
<?php include '../rodape_interno.php'; ?>
