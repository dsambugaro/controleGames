<?php
    include '../bd_control/conecta.php';
    include 'funcionario_control.php';

    $ID = $_POST['delete'];

    if (remove_funcionario($conexao, $ID)) {
        header("Location: ../funcionario.php?remove=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../funcionario.php?remove=0&error={$msg}");
        die();
    }
