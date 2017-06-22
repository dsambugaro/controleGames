<?php
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'cliente_control.php';

    $table = $_GET['table'];
    $campo = $_GET['campo'];
    $buscar = $_GET['term'];

    $acao = array_key_exists('acao', $_POST) ? $_POST['acao']:0;
    if ($acao == 0) {
            $busca = busca_auto_completa_cliente($conexao, $campo, $buscar);
            echo $busca;
    } else {
        $buscando = $_POST['filtro'];
        $tableMin = strtolower($table);
        $rows = busca_cliente($conexao, $campo, $buscando);
        foreach ($rows as $row):
            echo "<tr>";
            echo "<td>";
            echo "{$row['CPF']}";
            echo "</td>";
            echo "<td>";
            echo "{$row['nome']}";
            echo "</td>";
            echo "<td>";
            echo "{$row['user']}";
            echo "</td>";
            include '../acoes.php';
            echo "</tr>";
        endforeach;
    }
