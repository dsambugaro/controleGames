<?php
    include '../bd_control/conecta.php';
    include 'estado_control.php';

    $ID = $_POST['delete'];

    if (remove_estado($conexao, $ID)) {
        header("Location: ../estado.php?remove=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../estado.php?remove=0&error={$msg}");
        die();
    }
