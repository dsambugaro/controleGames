<?php
    include '../bd_control/conecta.php';
    include 'metodo_control.php';

    $ID = $_POST['delete'];

    if (remove_metodo($conexao, $ID)) {
        header("Location: ../metodo.php?remove=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../metodo.php?remove=0&error={$msg}");
        die();
    }
