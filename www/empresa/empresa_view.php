<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include 'empresa_control.php';

    $cnpj = $_POST['view'];
    $empresa = seleciona_tupla_empresa($conexao, $table, $cnpj);


?>
    <div class="container">
        <div class="row">
            <h3>Empresa - Visualizar</h3>
        </div>
        <hr />
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Nome</strong></p>
                    <p><?=$empresa['nome']?></p>
                </div>
                <div class="form-group col-md-4">
                    <p><strong>CNPJ</strong></p>
                    <p><?=$empresa['CNPJ']?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p><strong>Telefone</strong></p>
                    <p><?=$empresa['telefone']?></p>
                </div>
            </div>

            <br>
            <hr />

            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline">
                        <li>
                            <form action="empresa_edit.php" method="post">
                                <input type="hidden" name="edit" value="<?=$empresa['CNPJ']?>">
                                <button class="btn btn-primary">Editar</button>
                            </form>
                        </li>
                        <li>
                            <a href="../empresa.php" class="btn btn-default">Voltar</a>
                        </li>
                    </ul>
                </div>
            </div>
    </div>
<?php include '../rodape_interno.php'; ?>
