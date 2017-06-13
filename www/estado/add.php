<?php
    include '../bd_control/conecta.php';
    include 'estado_control.php';
    $nome_estado = $_POST['estado_nome'];
    if (insert_estado($conexao, $nome_estado)) {
        header("Location: ../estado/estado_add.php?add=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../estado/estado_add.php?add=0&error={$msg}");
        die();

    }
