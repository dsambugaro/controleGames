<?php
    include '../bd_control/conecta.php';
    include 'cidade_control.php';

    $ID = $_POST['delete'];

    if (remove_cidade($conexao, $ID)) {
        header("Location: ../cidade.php?remove=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../cidade.php?remove=0&error={$msg}");
        die();
    }
