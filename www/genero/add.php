<?php
    include '../bd_control/conecta.php';
    include 'genero_control.php';

    $nome_genero = $_POST['genero_nome'];
    if (insert_genero($conexao, $nome_genero)) {
        header("Location: ../genero/genero_add.php?add=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../genero/genero_add.php?add=0&error={$msg}");
        die();

    }
