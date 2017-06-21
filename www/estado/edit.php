<?php
    include '../bd_control/conecta.php';
    include 'estado_control.php';
    $nome_estado = $_POST['estado_nome'];
    $ID = $_POST['id'];

    if (alter_estado($conexao, $nome_estado, $ID)) {
        header("Location: ../estado.php?alter=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../estado.php?alter=0&error={$msg}");
        die();
    }
