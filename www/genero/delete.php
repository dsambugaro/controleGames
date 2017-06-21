<?php
    include '../bd_control/conecta.php';
    include 'genero_control.php';

    $ID = $_POST['delete'];

    if (remove_genero($conexao, $ID)) {
        header("Location: ../genero.php?remove=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../genero.php?remove=0&error={$msg}");
        die();
    }
