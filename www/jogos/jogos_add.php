<?php include '../cabecalho_interno.php'; ?>
    <div class="container">
        <div class="row">
            <h3>Jogo - Adicionar</h3>
        </div>
        <hr />
        <formaction="#" method="post">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" placeholder="Digite o Título" name="jogo_titulo">
                </div>
                <div class="form-group col-md-4">
                    <label for="codigo">Código</label>
                    <input type="text" class="form-control" id="codigo" placeholder="Código do jogo" name="jogo_cod">
                </div>
                <div class="form-group col-md-4">
                    <label for="lanc">Lançamento</label>
                    <input type="date" class="form-control" id="lanc" placeholder="Data de lançamento" name="jogo_lancamento">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="plat">Plataforma</label>
                    <select class="form-control" id="plat" name="jogo_plat">
                        <option value="0">Escolha uma Plataforma</option>
                        <option value="1">PC</option>
                        <option value="2">PS4</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="gen">Gênero</label>
                    <input type="text" class="form-control" id="gen" placeholder="Gênero do jogo" name="jogo_gen">
                </div>
                <div class="form-group col-md-4">
                    <label for="etaria">Faixa Etária</label>
                    <input type="number" class="form-control" id="etaria" placeholder="Faixa Etária" name="jogo_faixa" min="0" max="18">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="preco">Preço</label>
                    <input type="number" step="any" class="form-control" id="preco"  placeholder="Preço de venda do jogo" name="jogo_preco" min="0">
                </div>
                <div class="form-group col-md-4">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" class="form-control" id="quantidade" placeholder="Quantidade" name="jogo_qntd" min="0">
                </div>
                <div class="form-group col-md-4">
                    <label for="empresa_selecionada">Empresa</label>
                    <select class="form-control" id="empresa_selecionada" name="jogo_empresa">
                        <option value="0">Escolha uma Empresa</option>
                        <option value="99999999999999">RockStar</option>
                        <option value="99999999999998">Ubsoft</option>
                        <option value="99999999999997">Bethesda</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="sinopse">Sinopse</label>
                    <textarea type="textarea" class="form-control" id="sinopse" rows="5" placeholder="Sinopse do Jogo" name="jogo_sinopse"></textarea>
                </div>
            </div>

            <hr />

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                    <a href="../jogos.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
<?php include '../rodape_interno.php'; ?>
