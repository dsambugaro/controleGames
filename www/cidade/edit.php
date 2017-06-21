<?php
    include '../bd_control/conecta.php';
    include 'cidade_control.php';
    $nome_cidade = $_POST['cidade_nome'];
    $estado = $_POST['estado'];
    $ID = $_POST['id'];

    if (alter_cidade($conexao, $nome_cidade, $estado,$ID)) {
        header("Location: ../cidade.php?alter=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../cidade.php?alter=0&error={$msg}");
        die();
    }
