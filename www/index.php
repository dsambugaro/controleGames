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
                <li><a class="btn btn-primary" href="pedido.php">Pedidos</a></li>
                <li><a class="btn btn-primary" href="funcionario.php">Funcionarios</a></li>
                <li><a class="btn btn-primary" href="supervisor.php">Supervisores</a></li>
                <li><a class="btn btn-primary" href="jogos.php">Jogos</a></li>
                <li><a class="btn btn-primary" href="empresa.php">Empresas</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mais <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="metodo.php">Métodos de Pagamento</a></li>
                        <li><a href="plataforma.php">Plataformas</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
<?php
    include "rodape.php";
?>
