<?php
    include '../bd_control/conecta.php';
    include 'metodo_control.php';
    $nome_metodo = $_POST['metodo_nome'];
    if (insert_metodo($conexao, $nome_metodo)) {
        header("Location: ../metodo/metodo_add.php?add=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../metodo/metodo_add.php?add=0&error={$msg}");
        die();

    }
