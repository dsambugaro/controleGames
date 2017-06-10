<?php include '../cabecalho_interno.php'; ?>
    <div class="container">
        <div class="row">
            <h3>Jogo - Editar</h3>
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
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="../jogos.php" class="btn btn-default">Cancelar</a>
                </div>
                <div class="col-md-4 text-right">
                    <a href="#" data-toggle="modal" data-target="#delete-confirm" class="btn btn-danger">Deletar</a>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="delete-confirm" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
                </div>
                <div class="modal-body">
                    Deseja realmente excluir este item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                </div>
            </div>
        </div>
    </div>
    <?php
        include '../modal_excluir.php';
        include '../rodape_interno.php';
    ?>
