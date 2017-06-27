<?php
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'relatorio_control.php';

    $relatorio = $_POST['relatorio'];
    $data = $_POST['data'];
    $data1 = $_POST['data1'];
    $data2 = $_POST['data2'];
    $metodo = $_POST['metodo'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    switch ($relatorio) {
        case 1:
            $data1 = $_POST['data1'];
            $data2 = $_POST['data2'];
            $rows = relatorio_1($conexao, $data1, $data2);
            $tableMin = jogo;
            $key = codigo;
            $referencia = titulo;
            if ($rows) {
                echo "<div class=\"table-responsive col-md-12\">";
                echo "<table class=\"table table-hover\">";
                echo "<thead id=\"cabecalho\">";
                echo "<tr>";
                    echo "<th class=\"text-center\">Codigo</th>";
                    echo "<th class=\"text-center\">Título</th>";
                    echo "<th class=\"text-center\">Cópias Vendidas</th>";
                    echo "<th class=\"text-center\">Empresa</th>";
                    echo "<th class=\"text-center\">Ações</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody id=\"itens\">";
                foreach ($rows as $row):
                    echo "<tr>";
                        echo "<td>{$row['codigo']}</td>";
                        echo "<td>{$row['titulo']}</td>";
                        echo "<td>{$row['copias_vendidas']}</td>";
                        echo "<td>{$row['nome']}</td>";
                                include '../acoes.php';
                    echo "</tr>";
                endforeach;
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
                include 'excluir.php';
            } elseif ($rows == NULL) {
                echo "<p class=\"alert-danger text-center\">";
                echo "Nenhum resultado!";
                echo "</p>";
            } else {
                include "relatorio_erro.php";
            }
            break;

        case 2:
            $data1 = $_POST['data1'];
            $data2 = $_POST['data2'];
            $rows = relatorio_2($conexao, $data1, $data2);
            $tableMin = cliente;
            $key = PESSOA_CPF;
            $referencia = user;
            if ($rows) {
                echo "<div class=\"table-responsive col-md-12\">";
                echo "<table class=\"table table-hover\">";
                echo "<thead id=\"cabecalho\">";
                echo "<tr>";
                    echo "<th class=\"text-center\">CPF</th>";
                    echo "<th class=\"text-center\">Nome</th>";
                    echo "<th class=\"text-center\">Usuário</th>";
                    echo "<th class=\"text-center\">Total Gasto</th>";
                    echo "<th class=\"text-center\">Ações</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody id=\"itens\">";
                foreach ($rows as $row):
                    echo "<tr>";
                        echo "<td>{$row['PESSOA_CPF']}</td>";
                        echo "<td>{$row['nome_pessoa']}</td>";
                        echo "<td>{$row['user']}</td>";
                        echo "<td>{$row['total_gasto']}</td>";
                                include '../acoes.php';
                    echo "</tr>";
                endforeach;
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
                include 'excluir.php';
            } elseif ($rows == NULL) {
                echo "<p class=\"alert-danger text-center\">";
                echo "Nenhum resultado!";
                echo "</p>";
            } else {
                include "relatorio_erro.php";
            }
            break;

        case 3:
            $metodo = $_POST['metodo'];
            $rows = relatorio_3($conexao, $metodo);
            $tableMin = cliente;
            $key = PESSOA_CPF;
            $referencia = user;
            if ($rows) {
                echo "<div class=\"table-responsive col-md-12\">";
                echo "<table class=\"table table-hover\">";
                echo "<thead id=\"cabecalho\">";
                echo "<tr>";
                    echo "<th class=\"text-center\">CPF</th>";
                    echo "<th class=\"text-center\">Nome</th>";
                    echo "<th class=\"text-center\">Usuário</th>";
                    echo "<th class=\"text-center\">Ações</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody id=\"itens\">";
                foreach ($rows as $row):
                    echo "<tr>";
                        echo "<td>{$row['PESSOA_CPF']}</td>";
                        echo "<td>{$row['nome_pessoa']}</td>";
                        echo "<td>{$row['user']}</td>";
                                include '../acoes.php';
                    echo "</tr>";
                endforeach;
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
                include 'excluir.php';
            } elseif ($rows == NULL) {
                echo "<p class=\"alert-danger text-center\">";
                echo "Nenhum resultado!";
                echo "</p>";
            } else {
                include "relatorio_erro.php";
            }
            break;

        case 4:
            $data = $_POST['data'];
            $rows = relatorio_4($conexao, $data);
            $tableMin = cliente;
            $key = PESSOA_CPF;
            $referencia = user;
            if ($rows) {
                echo "<div class=\"table-responsive col-md-12\">";
                echo "<table class=\"table table-hover\">";
                echo "<thead id=\"cabecalho\">";
                echo "<tr>";
                    echo "<th class=\"text-center\">CPF</th>";
                    echo "<th class=\"text-center\">Nome</th>";
                    echo "<th class=\"text-center\">Usuário</th>";
                    echo "<th class=\"text-center\">Última Compra</th>";
                    echo "<th class=\"text-center\">Ações</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody id=\"itens\">";
                foreach ($rows as $row):
                    $data_formatada = date('d/m/Y', strtotime($row['data']));
                    echo "<tr>";
                        echo "<td>{$row['PESSOA_CPF']}</td>";
                        echo "<td>{$row['nome_pessoa']}</td>";
                        echo "<td>{$row['user']}</td>";
                        echo "<td>{$data_formatada}</td>";
                                include '../acoes.php';
                    echo "</tr>";
                endforeach;
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
                include 'excluir.php';
            } elseif ($rows == NULL) {
                echo "<p class=\"alert-danger text-center\">";
                echo "Nenhum resultado!";
                echo "</p>";
            } else {
                include "relatorio_erro.php";
            }
            break;
        case 5:
            $rows = relatorio_5($conexao);
            $tableMin = cliente;
            $key = PESSOA_CPF;
            $referencia = user;
            if ($rows) {
                echo "<div class=\"table-responsive col-md-12\">";
                echo "<table class=\"table table-hover\">";
                echo "<thead id=\"cabecalho\">";
                echo "<tr>";
                    echo "<th class=\"text-center\">CPF</th>";
                    echo "<th class=\"text-center\">Nome</th>";
                    echo "<th class=\"text-center\">Usuário</th>";
                    echo "<th class=\"text-center\">Ações</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody id=\"itens\">";
                foreach ($rows as $row):
                    echo "<tr>";
                        echo "<td>{$row['PESSOA_CPF']}</td>";
                        echo "<td>{$row['nome_pessoa']}</td>";
                        echo "<td>{$row['user']}</td>";
                                include '../acoes.php';
                    echo "</tr>";
                endforeach;
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
                include 'excluir.php';
            } elseif ($rows == NULL) {
                echo "<p class=\"alert-danger text-center\">";
                echo "Nenhum resultado!";
                echo "</p>";
            } else {
                include "relatorio_erro.php";
            }
            break;

        case 6:
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $rows = relatorio_6($conexao, $cidade, $estado);
            $tableMin = cliente;
            $key = PESSOA_CPF;
            $referencia = user;
            if ($rows) {
                echo "<div class=\"table-responsive col-md-12\">";
                echo "<table class=\"table table-hover\">";
                echo "<thead id=\"cabecalho\">";
                echo "<tr>";
                    echo "<th class=\"text-center\">CPF</th>";
                    echo "<th class=\"text-center\">Nome</th>";
                    echo "<th class=\"text-center\">Usuário</th>";
                    echo "<th class=\"text-center\">Cidade</th>";
                    echo "<th class=\"text-center\">Ações</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody id=\"itens\">";
                foreach ($rows as $row):
                    echo "<tr>";
                        echo "<td>{$row['PESSOA_CPF']}</td>";
                        echo "<td>{$row['nome_pessoa']}</td>";
                        echo "<td>{$row['user']}</td>";
                        echo "<td>{$row['nome']}</td>";
                                include '../acoes.php';
                    echo "</tr>";
                endforeach;
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
                include 'excluir.php';
            } elseif ($rows == NULL) {
                echo "<p class=\"alert-danger text-center\">";
                echo "Nenhum resultado!";
                echo "</p>";
            } else {
                include "relatorio_erro.php";
            }
            break;

        case 7:
            $rows = relatorio_7($conexao);
            $tableMin = empresa;
            $key = CNPJ;
            $referencia = nome;
            if ($rows) {
                echo "<div class=\"table-responsive col-md-12\">";
                echo "<table class=\"table table-hover\">";
                echo "<thead id=\"cabecalho\">";
                echo "<tr>";
                    echo "<th class=\"text-center\">CNPJ</th>";
                    echo "<th class=\"text-center\">Nome</th>";
                    echo "<th class=\"text-center\">Telefone</th>";
                    echo "<th class=\"text-center\">Quantidade de Jogos Cadastrados</th>";
                    echo "<th class=\"text-center\">Ações</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody id=\"itens\">";
                foreach ($rows as $row):
                    echo "<tr>";
                        echo "<td>{$row['CNPJ']}</td>";
                        echo "<td>{$row['nome']}</td>";
                        echo "<td>{$row['telefone']}</td>";
                        echo "<td>{$row['jogos_cadastrados']}</td>";
                                include '../acoes.php';
                    echo "</tr>";
                endforeach;
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
                include 'excluir.php';
            } elseif ($rows == NULL) {
                echo "<p class=\"alert-danger text-center\">";
                echo "Nenhum resultado!";
                echo "</p>";
            } else {
                include "relatorio_erro.php";
            }
            break;

        case 8:
            $rows = relatorio_8($conexao);
            $tableMin = empresa;
            $key = CNPJ;
            $referencia = nome;
            if ($rows) {
                echo "<div class=\"table-responsive col-md-12\">";
                echo "<table class=\"table table-hover\">";
                echo "<thead id=\"cabecalho\">";
                echo "<tr>";
                    echo "<th class=\"text-center\">CNPJ</th>";
                    echo "<th class=\"text-center\">Nome</th>";
                    echo "<th class=\"text-center\">Telefone</th>";
                    echo "<th class=\"text-center\">Quantidade de Jogos Vendidos</th>";
                    echo "<th class=\"text-center\">Ações</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody id=\"itens\">";
                foreach ($rows as $row):
                    echo "<tr>";
                        echo "<td>{$row['CNPJ']}</td>";
                        echo "<td>{$row['nome']}</td>";
                        echo "<td>{$row['telefone']}</td>";
                        echo "<td>{$row['jogos_vendidos']}</td>";
                                include '../acoes.php';
                    echo "</tr>";
                endforeach;
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
                include 'excluir.php';
            } elseif ($rows == NULL) {
                echo "<p class=\"alert-danger text-center\">";
                echo "Nenhum resultado!";
                echo "</p>";
            } else {
                include "relatorio_erro.php";
            }
            break;

        case 9:
            $data1 = $_POST['data1'];
            $data2 = $_POST['data2'];
            $rows = relatorio_9($conexao, $data1, $data2);
            $tableMin = supervisor;
            $key = FUNCIONARIO_PESSOA_CPF;
            $referencia = user;
            if ($rows) {
                echo "<div class=\"table-responsive col-md-12\">";
                echo "<table class=\"table table-hover\">";
                echo "<thead id=\"cabecalho\">";
                echo "<tr>";
                    echo "<th class=\"text-center\">CPF</th>";
                    echo "<th class=\"text-center\">Nome</th>";
                    echo "<th class=\"text-center\">Usuário</th>";
                    echo "<th class=\"text-center\">Cadastro</th>";
                    echo "<th class=\"text-center\">Ações</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody id=\"itens\">";
                foreach ($rows as $row):
                    echo "<tr>";
                        echo "<td>{$row['FUNCIONARIO_PESSOA_CPF']}</td>";
                        echo "<td>{$row['nome_pessoa']}</td>";
                        echo "<td>{$row['user']}</td>";
                        echo "<td>{$row['cracha']}</td>";
                                include '../acoes.php';
                    echo "</tr>";
                endforeach;
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
                include 'excluir.php';
            } elseif ($rows == NULL) {
                echo "<p class=\"alert-danger text-center\">";
                echo "Nenhum resultado!";
                echo "</p>";
            } else {
                include "relatorio_erro.php";
            }
            break;

        case 10:
            $data1 = $_POST['data1'];
            $data2 = $_POST['data2'];
            $rows = relatorio_10($conexao, $data1, $data2);
            $tableMin = estado;
            $key = ID;
            $referencia = nome;
            if ($rows) {
                echo "<div class=\"table-responsive col-md-12\">";
                echo "<table class=\"table table-hover\">";
                echo "<thead id=\"cabecalho\">";
                echo "<tr>";
                    echo "<th class=\"text-center\">Nome</th>";
                    echo "<th class=\"text-center\">Quantidade de pedidos</th>";
                    echo "<th class=\"text-center\">Ações</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody id=\"itens\">";
                foreach ($rows as $row):
                    echo "<tr>";
                        echo "<td>{$row['nome']}</td>";
                        echo "<td>{$row['numero_pedidos']}</td>";
                                include '../acoes.php';
                    echo "</tr>";
                endforeach;
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
                include 'excluir.php';
            } elseif ($rows == NULL) {
                echo "<p class=\"alert-danger text-center\">";
                echo "Nenhum resultado!";
                echo "</p>";
            } else {
                include "relatorio_erro.php";
            }
            break;
        default:
            echo "<p class=\"alert-danger text-center\">";
            echo "Nenhum relatório válido encontrado!";
            echo"<br><br>";
            echo"Em caso de dúvidas: entre em contato com o Administrador do Sistema</p>";
    }
