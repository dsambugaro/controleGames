<?php
    include '../bd_control/conecta.php';
    include 'pessoa_control.php';

    $ID = $_POST['delete'];

    if (remove_pessoa($conexao, $ID)) {
        header("Location: ../pessoa.php?remove=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../pessoa.php?remove=0&error={$msg}");
        die();
    }
