<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'usuario_control.php';

    $ID = $_POST['edit'];
    $row = seleciona_tupla_simples($conexao, $table, $ID);
?>
    <div class="container">
        <div class="row">
            <h3>Plataforma - Editar</h3>
        </div>
        <hr />
        <br>
        <form action="edit.php" method="post">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="usuario">Plataforma</label>
                    <input type="text" class="form-control" id="usuario"
                        placeholder="Plataforma" name="usuario_nome"
                        value="<?=$row['user']?>" required
                    >
                    <input type="hidden" class="form-control"
                        placeholder="Plataforma" name="id"
                        value="<?=$row['ID']?>"
                    >
                </div>
                <div class="form-group col-md-6">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha"
                        placeholder="Senha" name="usuario_senha"
                        value="<?=$row['senha']?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <input type="submit" value="Salvar" class="btn btn-primary">
                    <a href="../usuario.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
            </div>
        </form>
    </div>

    <?php
        include '../rodape_interno.php';
    ?>
