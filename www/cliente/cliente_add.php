<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    $url_busca = '../pessoa/busca_pessoa_cidade.php';
    include 'cliente_control.php';
    $pessoa = lista_tabela_simples($conexao, 'PESSOA');
?>
    <div class="container" onload="checaUsoPessoa()">
        <div class="row">
            <h3>Cliente - Adicionar</h3>
        </div>
        <hr />
        <form action="add.php" method="post">
            <div class="row">
                <div class="form-group col-md-12 text-right">
                    <input type="radio" id="busca_nome" name="campo" value="nome_pessoa" checked>
                    <label for="busca_nome">Nome</label>
                        <input type="radio" id="busca_cpf" name="campo" value="CPF">
                        <label for="busca_cpf">CPF</label>
                </div>
                <input type="hidden" name="campo_busca" value="nome" id="campo_busca">
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <input type="radio" value="add_yes" id="add_pessoa" name="usar_pessoa" onclick="checaUsoPessoa();" checked >
                    <label for="add_pessoa">Nova Pessoa</label>
                </div>
                <div class="form-group col-md-2">
                    <input type="radio" value="add_no" id="no_pessoa" name="usar_pessoa" onclick="checaUsoPessoa();">
                    <label for="no_pessoa">Pessoa Existente</label>
                </div>
                <div class="form-group col-md-6">
                    <!-- <select class="form-control" id="pessoa_selecionada" onchange="getPessoa();" name="pessoa_selecionada" disabled>
                        <option value=" ">Escolha uma pessoa...</option>

                    </select> -->
                    <input type="text" class="form-control" name="pessoa_selecionada" id="pessoa_selecionada" disabled>
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
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                    <a href="../cliente.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <script src="../pessoa_usar.js"></script>
    <script>
        $("#pessoa_selecionada").keypress( function(event){
            $( "#pessoa_selecionada" ).autocomplete({
                source: '../busca.php?campo='+$("input[name=campo]:checked").val()+'&table=PESSOA',
            });
        });
        $( "#pessoa_selecionada" ).on( "autocompleteselect", function( event, ui ) {
            var buscar = ui.item.value;
            $.ajax({
                method: "post",
                url: 'busca_pessoa_complete.php',
                data: 'campo='+$("input[name=campo]:checked").val()+'&filtro='+buscar,
                dataType: 'json',
                success: function(retorno){
                    console.log(retorno[0]);
                    var selecionado = ($("input[name=campo]:checked").val() == 'CPF') ? retorno[0].CPF:retorno[0].nome_pessoa;
                    $("#pessoa_selecionada").val(selecionado);
                    $("#cpf").val(retorno[0].CPF);
                    $("#nome").val(retorno[0].nome_pessoa);
                    $("#nascimento").val(retorno[0].data_nasc_pessoa);
                    $("#logradouro").val(retorno[0].logradouro);
                    $("#nome_end").val(retorno[0].nome);
                    $("#num").val(retorno[0].numero);
                    $("#bairro").val(retorno[0].bairro);
                    $("#cep").val(retorno[0].CEP);
                    $("#estado").val(retorno[0].estado_id);
                    $("#cidade").val(retorno[0].cidade);
                    $("#cidade_valida").val(retorno[0].cidade);
                    $("#id_cidade").val(retorno[0].CIDADE_ID);
                }
            });
        });
    </script>
<?php
    include '../rodape_interno.php';
?>
