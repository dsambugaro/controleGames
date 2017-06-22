<?php
    include '../bd_control/conecta.php';
    include '../bd_control/control.php';
    include '../pessoa/busca_pessoa_control.php';
    include 'cliente_control.php';

    $id = $_POST['filtro'];
    $campo = $_POST['campo'];

    $rows = busca_dinamica_pessoa($conexao, $campo, $id);
    echo json_encode($rows);
