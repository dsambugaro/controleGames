<?php include '../cabecalho_interno.php'; ?>
<script src="../jogos_pedido.js.js"></script>
    <div class="container">
        <div class="row">
            <h3>Pedido - Adicionar</h3>
        </div>
        <hr />
        <formaction="#" method="post">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="cliente">Cliente</label>
                    <input type="text" class="form-control" id="cliente" placeholder="Informe o Cliente" name="pedido"  required>
                </div>
                <div class="form-group col-md-4">
                    <label for="frete">Frete</label>
                    <input type="number" step="any" class="form-control" id="frete"  placeholder="Informe o Frete" min="0" onchange="calculaTotal();" name="pedido">
                </div>
                <div class="form-group col-md-4">
                    <label for="met_pag">Método de Pagamento</label>
                    <select class="form-control" id="met_pag">
                        <option value="0">Escolha uma método</option>
                        <option value="cartão">Cartão de Crédito</option>
                        <option value="boleto">Boleto</option>
                        <option value="deposito">Depósito Bancário</option>
                    </select>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <label for="jogos">Jogos</label>
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
                                    </tr>
                                </thead>
                                <tbody id="listaJogos">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="#" data-toggle="modal" data-target="#addGame" class="btn btn-default">Adicionar Jogo</a>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>
            <div class="row text-right">
                <p><strong>Total</strong></p>
                <p id="total"> -- </p>
            </div>

            <hr />

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                    <a href="../pedido.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>


    <div class="modal fade" id="addGame" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">Adicionar Jogo</h4>
                </div>
                <div class="modal-body">
                    <formaction="#" method="post">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="codigo">Código Jogo</label>
                                <input type="number" class="form-control" id="codigo" placeholder="Informe o Código">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="quantidade">Quantidade</label>
                                <input type="number" class="form-control" id="quantidade" placeholder="Informe a Quantidade">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary" onclick="addJogo();" data-dismiss="modal">Adicionar</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <?php
        include '../rodape_interno.php';
    ?>
