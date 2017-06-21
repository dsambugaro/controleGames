<?php
    include '../bd_control/conecta.php';
    include 'cidade_control.php';

    $nome_cidade = $_POST['cidade_nome'];
    $estado = $_POST['estado'];

    if (insert_cidade($conexao, $nome_cidade, $estado)) {
        header("Location: ../cidade/cidade_add.php?add=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../cidade/cidade_add.php?add=0&error={$msg}");
        die();

    }
