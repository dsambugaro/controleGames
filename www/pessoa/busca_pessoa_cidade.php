<?php
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include 'busca_pessoa_control.php';

    $table = $_GET['table'];
    $campo = $_GET['campo'];
    $id = $_GET['key'];
    $campo_id = 'ESTADO_ID';

    $acao = array_key_exists('acao', $_POST) ? $_POST['acao']:0;
    if (($acao == 0)) {
        $buscar = $_GET['term'];
        $busca = busca_auto_completa_cidade($conexao, $table, $campo, $buscar, $campo_id, $id);
        echo $busca;
    } else {
        $buscando = $_POST['filtro'];
        $tableMin = strtolower($table);
        $rows = busca_dinamica_cidade($conexao, $table, $campo, $buscando, $campo_id, $id);
        echo json_encode($rows);
    }
