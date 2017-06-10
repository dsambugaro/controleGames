<?php
    include '../cabecalho_interno.php';
?>
    <div class="container">
        <div class="row">
            <h3>Supervisor - Adicionar</h3>
        </div>
        <hr />
        <formaction="#" method="post">
            <div class="row">
                <div class="form-group col-md-3 text-right">
                    <input type="radio" value="add_yes" id="add_funcionario" name="usar_funcionario" onclick="checaUsofuncionario();" checked>
                    <label for="add_funcionario">Novo Funcionario</label>
                </div>
                <div class="form-group col-md-3 text-left">
                    <select class="form-control" id="pessoa_selecionada" onchange="getfuncionario();" name="pessoa_selecionada" disabled>
                        <option value="0">Escolha uma pessoa</option>
                        <option value="12345678912">12345678912</option>
                        <option value="15975315975">15975315975</option>
                        <option value="23645789875">23645789875</option>
                    </select>
                </div>
                <div class="form-group col-md-3 text-right">
                    <input type="radio" value="add_no" id="no_funcionario" name="usar_funcionario" onclick="checaUsofuncionario();" >
                    <label for="no_funcionario">Funcionario Existente</label>
                </div>
                <div class="form-group col-md-3 text-left">
                    <select class="form-control" id="funcionario_selecionado" onchange="getfuncionario();" name="funcionario_selecionado" disabled>
                        <option value="0">Escolha um Funcionário</option>
                        <option value="12345678912">12345678912</option>
                        <option value="15975315975">15975315975</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="cadastro">Cadastro</label>
                    <input type="number" class="form-control pessoa" id="cadastro" placeholder="Cadastro" name="funcionario_cad">
                </div>
            </div>
            <hr />

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="usuario">Usuário</label>
                    <input type="text" class="form-control funcionario" id="usuario" placeholder="Usuário" name="supervisor_user" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control funcionario" id="senha" placeholder="Senha" name="supervisor_password" required>
                </div>
            </div>
            <hr />

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                    <a href="../supervisor.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <script src="../usar_funcionario.js"></script>
    <script>
        $(document).ready = checaUsofuncionario();
    </script>
    <?php
        include '../rodape_interno.php';
    ?>
