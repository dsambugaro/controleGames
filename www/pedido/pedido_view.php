<?php include '../cabecalho_interno.php'; ?>
    <div class="container">
        <div class="row">
            <h3>Pedido - Visualizar</h3>
        </div>
        <hr />
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Cliente</strong></p>
                    <p>Lorem ipsum</p>
                </div>
                <div class="form-group col-md-4">
                    <p><strong>ID Pedido</strong></p>
                    <p>123</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Data</strong></p>
                    <p>DD/MM/AAAA</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Valor Frete</strong></p>
                    <p>R$ 19,50</p>
                </div>
                <div class="col-md-4">
                        <p><strong>Valor Total</strong></p>
                        <p id="total">R$ 319,50</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Método de Pagamento</strong></p>
                    <p>Boleto</p>
                </div>
            </div>
            <br><br>
            <div id="list" class="row text-center">
                <p><strong>Jogos no pedido</strong></p>
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
                        <tbody>
                            <tr>
                                <td>123456</td>
                                <td>Dolor sit amet consectetur </td>
                                <td>10</td>
                                <td>10</td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>123455</td>
                                <td>Dolor sit amet consectetur </td>
                                <td>20</td>
                                <td>10</td>
                                <td>200</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>

            <br><br>
            <hr />

            <div class="row">
                <div class="col-md-8">
                    <a href="pedido_edit.php" class="btn btn-primary">Editar</a>
                    <a href="../pedido.php" class="btn btn-default">Voltar</a>
                </div>
            </div>
    </div>
<?php include '../rodape_interno.php'; ?>
