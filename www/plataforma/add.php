<?php
    include '../bd_control/conecta.php';
    include 'plataforma_control.php';
    $nome_plataforma = $_POST['plataforma_nome'];
    if (insert_plataforma($conexao, $nome_plataforma)) {
        header("Location: ../plataforma/plataforma_add.php?add=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../plataforma/plataforma_add.php?add=0&error={$msg}");
        die();

    }
