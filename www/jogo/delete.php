<?php
    include '../bd_control/conecta.php';
    include 'jogo_control.php';

    $codigo = $_POST['delete'];

    if (remove_jogo($conexao, $codigo)) {
        header("Location: ../jogo.php?remove=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../jogo.php?remove=0&error={$msg}");
        die();
    }
