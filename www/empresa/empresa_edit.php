<?php include '../cabecalho_interno.php'; ?>
    <div class="container">
        <div class="row">
            <h3>Empresa - Editar</h3>
        </div>
        <hr />
        <formaction="#" method="post">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" placeholder="Digite o nome" name="empresa_nome">
                </div>
                <div class="form-group col-md-4">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" class="form-control" id="cnpj" placeholder="CNPJ sem pontuação" name="empresa_cnpj">
                </div>
                <div class="form-group col-md-4">
                    <label for="tel">Telefone</label>
                    <input type="text" class="form-control" id="tel" placeholder="Telefone com DDD" name="empresa_telefone">
                </div>
            </div>

            <hr />

            <div class="row">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="../empresa.php" class="btn btn-default">Cancelar</a>
                </div>
                <div class="col-md-4 text-right">
                    <a href="#" data-toggle="modal" data-target="#delete-confirm" class="btn btn-danger">Deletar</a>
                </div>
            </div>
        </form>
    </div>

    <?php
        include '../modal_excluir.php';
        include '../cabecalho_interno.php';
    ?>
