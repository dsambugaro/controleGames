<?php
    include '../bd_control/conecta.php';
    include 'usuario_control.php';

    $ID = $_POST['delete'];

    if (remove_usuario($conexao, $ID)) {
        header("Location: ../usuario.php?remove=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../usuario.php?remove=0&error={$msg}");
        die();
    }
