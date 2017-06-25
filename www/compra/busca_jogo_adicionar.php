<?php
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include '../jogo/jogo_control.php';

    $campo = $_GET['campo'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $buscando = $_POST['filtro'];
    $acao = $_POST['acao'];

    $rows = busca_jogo($conexao, $campo, $buscando);
    if ($acao == 1) {
        echo json_encode($rows);
    } elseif ($acao == 2) {
        foreach ($rows as $row):
            $preco_total = $quantidade * $preco;
            echo "<tr>";
            echo "<td>";
            echo "{$row['codigo']}";
            echo "</td>";
            echo "<td>";
            echo "{$row['titulo']}";
            echo "</td>";
            echo "<td>";
            echo "{$preco}";
            echo "</td>";
            echo "<td>";
            echo "{$quantidade}";
            echo "</td>";
            echo "<td>";
            echo "{$preco_total}";
            echo "</td>";
            echo "<td>";
            echo "<button type=\"button\" class=\"btn btn-sm btn-danger\" onclick=\"$(this).closest('tr').remove(); calculaTotal(); listaJogos();\" value=\"X\"><span class=\"glyphicon glyphicon-remove\"></span></button>";
            echo "</td>";
            echo "</tr>";
        endforeach;
    }
