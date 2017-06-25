<?php
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'empresa_control.php';

    $table = $_GET['table'];
    $campo = $_GET['campo'];
    $buscar = $_GET['term'];

    $acao = array_key_exists('acao', $_POST) ? $_POST['acao']:0;
    if ($acao == 0) {
            $busca = busca_auto_completa($conexao, $table, $campo, $buscar);
            echo $busca;
    } else {
        $buscando = $_POST['filtro'];
        $tableMin = strtolower($table);
        $rows = busca_dinamica($conexao, $table, $campo, $buscando);
        foreach ($rows as $row):
            echo "<tr>";
            echo "<td>";
            echo "{$row['CNPJ']}";
            echo "</td>";
            echo "<td>";
            echo "{$row['nome']}";
            echo "</td>";
            echo "<td>";
            echo "{$row['telefone']}";
            echo "</td>";
            include '../acoes.php';
            echo "</tr>";
        endforeach;
    }
