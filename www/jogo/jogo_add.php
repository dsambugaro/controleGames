<?php
    include '../cabecalho_interno.php';
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'jogo_control.php';

    $plataformas = lista_tabela_simples($conexao, 'PLATAFORMA');
    $generos = lista_tabela_simples($conexao, 'GENERO');
    $empresas = lista_tabela_simples($conexao, 'EMPRESA');
?>
    <div class="container">
        <div class="row">
            <h3>Jogo - Adicionar</h3>
        </div>
        <hr />
        <?php
            include '../results.php';
        ?>
        <form action="add.php" method="post">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" placeholder="Digite o Título" name="jogo_titulo" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="codigo">Código</label>
                    <input type="text" class="form-control" id="codigo" placeholder="Código do jogo" name="jogo_cod" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="lanc">Lançamento</label>
                    <input type="date" class="form-control" id="lanc" placeholder="Data de lançamento" name="jogo_lancamento" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="plat">Plataforma</label>
                    <select class="form-control" id="plat" name="jogo_plat" required>
                        <option value="">Escolha uma Plataforma</option>
                        <?php
                            foreach ($plataformas as $plataforma):
                        ?>
                                <option value="<?=$plataforma['ID']?>"><?=$plataforma['nome']?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="gen">Gênero</label>
                    <select class="form-control" id="gen" name="jogo_gen" required>
                        <option value="">Escolha um Gênero</option>
                        <?php
                            foreach ($generos as $genero):
                        ?>
                                <option value="<?=$genero['ID']?>"><?=$genero['nome']?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="etaria">Faixa Etária</label>
                    <input type="number" class="form-control" id="etaria" placeholder="Faixa Etária" name="jogo_faixa" min="0" max="18" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="preco">Preço</label>
                    <input type="number" step="any" class="form-control" id="preco"  placeholder="Preço de venda do jogo" name="jogo_preco" min="0" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" class="form-control" id="quantidade" placeholder="Quantidade" name="jogo_qntd" min="0" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="empresa_selecionada">Empresa</label>
                    <select class="form-control" id="empresa_selecionada" name="jogo_empresa" required>
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
                    <a href="../jogo.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
<?php include '../rodape_interno.php'; ?>
