<?php
    include '../bd_control/conecta.php';
    include 'compra_control.php';

    $ID = $_POST['delete'];

    if (remove_compra($conexao, $ID)) {
        header("Location: ../compra.php?remove=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../compra.php?remove=0&error={$msg}");
        die();
    }
