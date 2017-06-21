<?php
    include '../cabecalho_interno.php';
?>
    <div class="container">
        <div class="row">
            <h3>Cliente - Editar</h3>
        </div>
        <hr />
        <form action="edit.php" method="post">
            <div class="row">
                <div class="form-group col-md-4">
                    <input type="radio" value="add_yes" id="add_pessoa" name="usar_pessoa" onclick="checaUsoPessoa();" >
                    <label for="add_pessoa">Nova Pessoa</label>
                </div>
                <div class="form-group col-md-2">
                    <input type="radio" value="add_no" id="no_pessoa" name="usar_pessoa" onclick="checaUsoPessoa();" checked>
                    <label for="no_pessoa">Pessoa Existente</label>
                </div>
                <div class="form-group col-md-6">
                    <select class="form-control" id="pessoa_selecionada" onchange="getPessoa();" name="pessoa_selecionada" disabled>
                        <option value="0">Escolha uma pessoa...</option>
                        <option value="12345678912">12345678912</option>
                        <option value="15975315975">15975315975</option>
                        <option value="23645789875">23645789875</option>
                    </select>
                </div>
            </div>
            <?php
                include '../pessoa/form_pessoa.php';
            ?>
            <hr />

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="usuario">Usuário</label>
                    <input type="text" class="form-control" id="usuario" placeholder="Usuário" name="cliente_user">
                </div>
                <div class="form-group col-md-4">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" placeholder="Senha" name="cliente_password">
                </div>
                <div class="form-group col-md-4">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="senha" placeholder="E-mail válido" name="cliente_email">
                </div>
            </div>
            <hr />

            <div class="row">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="../cliente.php" class="btn btn-default">Cancelar</a>
                </div>
                <div class="col-md-4 text-right">
                    <a href="#" data-toggle="modal" data-target="#delete-confirm" class="btn btn-danger">Deletar</a>
                </div>
            </div>
        </form>
    </div>
    <script src="../usar_pessoa.js"></script>
    <script>
        $(document).ready = checaUsoPessoa();
    </script>
    <?php
        include '../modal_excluir.php';
        include '../rodape_interno.php';
    ?>
