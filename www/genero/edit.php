<?php
    include '../bd_control/conecta.php';
    include 'genero_control.php';
    $nome_genero = $_POST['genero_nome'];
    $ID = $_POST['id'];

    if (alter_genero($conexao, $nome_genero, $ID)) {
        header("Location: ../genero.php?alter=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../genero.php?alter=0&error={$msg}");
        die();
    }
