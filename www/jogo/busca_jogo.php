<?php
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'jogo_control.php';

    $table = $_GET['table'];
    $campo = $_GET['campo'];
    $buscar = $_GET['term'];
    $empresa = array_key_exists('empresa', $_GET) ? $_GET['empresa']:-1;
    $acao = array_key_exists('acao', $_POST) ? $_POST['acao']:0;

    if (($acao == 0) && ($empresa == -1)) {
        $busca = busca_auto_completa_jogo($conexao, $campo, $buscar);
        echo $busca;
    } elseif (!($empresa == 0)) {
        $busca = busca_auto_completa_jogo_empresa($conexao, $campo, $buscar, $empresa);
        echo $busca;
    } else {
        $buscando = $_POST['filtro'];
        $tableMin = strtolower($table);
        $rows = busca_jogo($conexao, $campo, $buscando);
        foreach ($rows as $row):
            echo "<tr>";
            echo "<td>";
            echo "{$row['codigo']}";
            echo "</td>";
            echo "<td>";
            echo "{$row['titulo']}";
            echo "</td>";
            echo "<td>";
            echo date('d/m/Y', strtotime($row['lancamento']));
            echo "</td>";
            echo "<td>";
            echo "{$row['nome']}";
            echo "</td>";
            include '../acoes.php';
            echo "</tr>";
        endforeach;
    }
