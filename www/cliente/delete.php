<?php
    include '../bd_control/conecta.php';
    include 'cliente_control.php';

    $ID = $_POST['delete'];

    if (remove_cliente($conexao, $ID)) {
        header("Location: ../cliente.php?remove=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../cliente.php?remove=0&error={$msg}");
        die();
    }
