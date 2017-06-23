<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    $url_busca = '../pessoa/busca_pessoa_cidade.php';
    include 'funcionario_control.php';
    $pessoa = lista_tabela_simples($conexao, 'PESSOA');
?>
    <div class="container" onload="checaUsoPessoa()">
        <div class="row">
            <h3>Funcionário - Adicionar</h3>
        </div>
        <hr />
        <?php
            include '../results.php';
        ?>
        <br>
        <form action="add.php" method="post">
            <div class="row">
                <div class="form-group col-md-12 text-right">
                    <input type="radio" id="busca_nome" name="campo" value="nome_pessoa" checked>
                    <label for="busca_nome">Nome</label>
                        <input type="radio" id="busca_cpf" name="campo" value="CPF">
                        <label for="busca_cpf">CPF</label>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <input type="radio" value="0" id="add_pessoa" name="usar_pessoa" onclick="checaUsoPessoa();" checked >
                    <label for="add_pessoa">Nova Pessoa</label>
                </div>
                <div class="form-group col-md-2">
                    <input type="radio" value="1" id="no_pessoa" name="usar_pessoa" onclick="checaUsoPessoa();">
                    <label for="no_pessoa">Pessoa Existente</label>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="pessoa_selecionada" id="pessoa_selecionada" disabled>
                </div>
            </div>
            <?php
                include '../pessoa/form_pessoa.php';
            ?>
            <hr />
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="telefone" placeholder="Telefone com DDD" name="funcionario_telefone" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="supervisor">Supervisor</label>
                    <input type="text" class="form-control" id="supervisor" placeholder="Supervisor" name="supervisor" required>
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
    <script src="../pessoa_usar.js"></script>
<?php
    include '../pessoa_usar.php';
    include '../rodape_interno.php';
?>
