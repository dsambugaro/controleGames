<?php
    include '../cabecalho_interno.php';
?>
    <div class="container">
        <div class="row">
            <h3>Pessoa - Editar</h3>
        </div>
        <hr />
        <formaction="#" method="post">
            <?php
                include 'form_pessoa.php';
            ?>
            <hr />
            <div class="row">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="../pessoa.php" class="btn btn-default">Cancelar</a>
                </div>
                <div class="col-md-4 text-right">
                    <a href="#" data-toggle="modal" data-target="#delete-confirm" class="btn btn-danger">Deletar</a>
                </div>
            </div>
        </form>
    </div>

<?php
    include '../modal_excluir.php';
    include '../rodape_interno.php';
?>
