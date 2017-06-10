<?php
    include '../cabecalho_interno.php';
?>
    <div class="container">
        <div class="row">
            <h3>Funcionário - Adicionar</h3>
        </div>
        <hr />
        <formaction="#" method="post">
            <div class="row">
                <div class="form-group col-md-4">
                    <input type="radio" value="add_yes" id="add_pessoa" name="usar_pessoa" onclick="checaUsoPessoa();" checked >
                    <label for="add_pessoa">Nova Pessoa</label>
                </div>
                <div class="form-group col-md-2">
                    <input type="radio" value="add_no" id="no_pessoa" name="usar_pessoa" onclick="checaUsoPessoa();" >
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
                    <label for="cadastro">Cadastro</label>
                    <input type="text" class="form-control" id="Cadastro" placeholder="cadastro" name="funcionario_cad">
                </div>
            </div>
            
            <hr />

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                    <a href="../funcionario.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <script src="../usar_pessoa.js"></script>
    <?php
        include '../rodape_interno.php';
    ?>
