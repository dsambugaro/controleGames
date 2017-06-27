<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'compra_control.php';
    $empresas = lista_tabela_simples($conexao, 'EMPRESA');
?>
    <div class="container">
        <div class="row">
            <h3>Compra - Adicionar</h3>
        </div>
        <hr />
        <?php
            include '../results.php';
        ?>
        <form action="add.php" method="post">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="supervisor">Supervisor</label>
                    <input type="text" class="form-control" id="supervisor"
                        placeholder="Informe o Supervisor" name="supervisor"  required
                    >
                </div>
                <div class="form-group col-md-4">
                    <label for="empresa_selecionada">Empresa</label>
                    <select class="form-control" id="empresa_selecionada" name="empresa" onchange="limpaJogos();" required>
                        <option value="">Escolha uma Empresa</option>
                        <?php
                            foreach ($empresas as $empresa):
                        ?>
                                <option value="<?=$empresa['CNPJ']?>"><?=$empresa['nome']?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <br><br>
            <input type="hidden" class="form-control" id="jogos" name="jogos" required>
            <input type="hidden" class="form-control" id="qnt_jogos" name="qnt_jogos" required>
            <input type="hidden" class="form-control" id="valor_total" name="valor_total" required>
            <input type="hidden" class="form-control" id="preco_jogos" name="preco_jogos" required>
            <input type="hidden" class="form-control" id="frete" name="frete" value="0" required>
            <div class="row">
                <div class="col-md-12">
                    <label for="jogo">Jogos</label>
                    <div id="list" class="row text-center">
                        <div class="table-responsive col-md-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Código</th>
                                        <th class="text-center">Título</th>
                                        <th class="text-center">Preço</th>
                                        <th class="text-center">Quantidade</th>
                                        <th class="text-center">Total Individual</th>
                                        <th class="text-center"></th>
                                    </tr>
                                    <tr id="adicionarNovo">
                                        <td>
                                            <input type="number" class="form-control" id="codigo" placeholder="Informe o Código">
                                            <input type="hidden" id="cod" name="cod_jogo">
                                        </td>
                                        <td id="titulo">   ----------   </td>
                                        <td>
                                            <input type="number" class="form-control" id="preco" min="0" placeholder="Informe o preco" disabled>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" id="quantidade" min="0" placeholder="Informe a Quantidade" disabled>
                                        </td>
                                        <td id="total_unidade">  -----  </span></td>
                                        <td>
                                            <button type="button" id="addJogo" class="btn btn-sm btn-default"
                                                onclick="add(); return false;" disabled>
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody id="listaJogos">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>
            <div class="row text-right">
                <p><strong>Total</strong></p>
                <p id="total">R$ 0.00 </p>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" onclick="return valida();" class="btn btn-primary">Adicionar</button>
                    <a href="../compra.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        $("#supervisor").keypress( function(event){
            $( "#supervisor" ).autocomplete({
                source: '../busca.php?campo=FUNCIONARIO_PESSOA_CPF&table=SUPERVISOR',
                select: function(event, ui){
                    var buscar = ui.item.value;
                    $("#supervisor").val(buscar);
                }
            });
        });

        function limpaJogos(){
            var lista = document.getElementById("listaJogos");
            var total = document.getElementById("total");
            var qnt = document.getElementById("quantidade");
            var preco = document.getElementById("preco");
            var codigo = document.getElementById("codigo");
            lista.innerHTML = "";
            titulo.innerHTML = "   ----------   ";
            total_unidade.innerHTML = "  -----  ";
            qnt.value = "";
            preco.value = "";
            codigo.value = "";
            preco.setAttribute('disabled', true);
            qnt.setAttribute('disabled', true);
            calculaTotal();
            listaJogos();
        }
    </script>
    <?php
        include 'jogo_pedido.php';
        include '../rodape_interno.php';
    ?>
