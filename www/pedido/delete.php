<?php
    include '../bd_control/conecta.php';
    include 'pedido_control.php';

    $ID = $_POST['delete'];

    if (remove_pedido($conexao, $ID)) {
        header("Location: ../pedido.php?remove=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../pedido.php?remove=0&error={$msg}");
        die();
    }
