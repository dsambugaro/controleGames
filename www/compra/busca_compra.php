<?php
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'compra_control.php';

    $campo = $_GET['campo'];
    $buscar = $_GET['term'];

    $acao = array_key_exists('acao', $_POST) ? $_POST['acao']:0;
    if ($acao == 0) {
            $busca = busca_auto_completa_compra($conexao, $campo, $buscar);
            echo $busca;
    } else {
        $buscando = $_POST['filtro'];
        $tableMin = strtolower($table);
        $rows = busca_compra($conexao, $campo, $buscando);
        foreach ($rows as $row):
            echo "<tr>";
            echo "<td>";
            echo "{$row['ID']}";
            echo "</td>";
            echo "<td>";
            echo "{$row['nome']}";
            echo "</td>";
            echo "<td>";
            echo "{$row['user']}";
            echo "</td>";
            echo "<td>";
            echo "R$";
            echo "{$row['preco_total']}";
            echo "</td>";
            echo "<td>";
            echo date('d/m/Y', strtotime($row['data']));
            echo "</td>";
            include '../acoes.php';
            echo "</tr>";
        endforeach;
    }
