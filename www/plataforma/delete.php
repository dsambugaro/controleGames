<?php
    include '../bd_control/conecta.php';
    include 'plataforma_control.php';

    $ID = $_POST['delete'];

    if (remove_plataforma($conexao, $ID)) {
        header("Location: ../plataforma.php?remove=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../plataforma.php?remove=0&error={$msg}");
        die();
    }
