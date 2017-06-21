<?php
    include '../bd_control/conecta.php';
    include 'plataforma_control.php';
    $nome_plataforma = $_POST['plataforma_nome'];
    $ID = $_POST['id'];

    if (alter_plataforma($conexao, $nome_plataforma, $ID)) {
        header("Location: ../plataforma.php?alter=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../plataforma.php?alter=0&error={$msg}");
        die();
    }
