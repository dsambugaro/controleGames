<?php
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'cidade_control.php';

    $table = $_GET['table'];
    $campo = $_GET['campo'];
    $buscar = $_GET['term'];

    $acao = array_key_exists('acao', $_POST) ? $_POST['acao']:0;
    if (($acao == 0)) {
        if($campo == 'nome') {
            $busca = busca_auto_completa($conexao, $table, $campo, $buscar);
        } else {
            $busca = busca_auto_completa_estado($conexao, $table, $campo, $buscar);
        }
        echo $busca;
    } else {
        $buscando = $_POST['filtro'];
        $tableMin = strtolower($table);
        if(($acao == 1) && ($campo == 'nome')) {
            $rows = busca_por_cidade($conexao, $campo, $buscando);
        } else {
            $rows = busca_por_estado($conexao, $campo, $buscando);
        }
        foreach ($rows as $row):
            echo "<tr>";
            echo "<td>";
            echo "{$row['nome']}";
            echo "</td>";
            echo "<td>";
            echo "{$row['estado']}";
            echo "</td>";
            include '../acoes.php';
            echo "</tr>";
        endforeach;
    }
