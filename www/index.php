<?php
    include "cabecalho.php";
?>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h1 style="font-size:60px;">Bem vindo ao GameOver!</h1>
                <hr />
            </div>
        </div>
        <br><br><br>
        <div class="row text-center">
            <ul class="list-inline">
                <li><a class="btn btn-primary" href="pessoa.php">Pessoas</a></li>
                <li><a class="btn btn-primary" href="cliente.php">Clientes</a></li>
                <li class="dropdown">
                    <a class="btn btn-primary" href="pedido.php" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Pedidos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="metodo.php">Métodos de Pagamento</a></li>
                    </ul>
                </li>
                <li><a class="btn btn-primary" href="compra.php">Compras</a></li>
                <li><a class="btn btn-primary" href="funcionario.php">Funcionarios</a></li>
                <li><a class="btn btn-primary" href="supervisor.php">Supervisores</a></li>
                <li class="dropdown">
                    <a class="btn btn-primary" href="jogo.php" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Jogos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="plataforma.php">Plataformas</a></li>
                        <li><a href="genero.php">Gêneros</a></li>
                    </ul>
                </li>
                <li><a class="btn btn-primary" href="empresa.php">Empresas</a></li>
                <li class="dropdown">
                    <a class="btn btn-primary" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mais <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="usuario.php">Usuários</a></li>
                        <li><a href="estado.php">Estados</a></li>
                        <li><a href="cidade.php">Cidades</a></li>
                        <li><a href="relatorio.php">Relatórios</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
<?php
    include "rodape.php";
?>
