<?php
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'funcionario_control.php';

    $table = $_GET['table'];
    $campo = $_GET['campo'];
    $buscar = $_GET['term'];

    $acao = array_key_exists('acao', $_POST) ? $_POST['acao']:0;
    if ($acao == 0) {
            $busca = busca_auto_completa_funcionario($conexao, $campo, $buscar);
            echo $busca;
    } else {
        $buscando = $_POST['filtro'];
        $tableMin = strtolower($table);
        $rows = busca_funcionario($conexao, $campo, $buscando);
        foreach ($rows as $row):
            $supervisor = ($row['supervisor'] == NULL) ? 'Não possui':supervisor_nome($conexao, $row['supervisor']);
            echo "<tr>";
            echo "<td>";
            echo "{$row['CPF']}";
            echo "</td>";
            echo "<td>";
            echo "{$row['nome']}";
            echo "</td>";
            echo "<td>";
            echo "{$row['cracha']}";
            echo "</td>";
            echo "<td>";
            echo "{$supervisor}";
            echo "</td>";
            include '../acoes.php';
            echo "</tr>";
        endforeach;
    }
