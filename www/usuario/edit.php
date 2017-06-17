<?php
    include '../bd_control/conecta.php';
    include 'usuario_control.php';
    $nome_usuario = $_POST['usuario_nome'];
    $senha_usuario = $_POST['usuario_senha'];
    $ID = $_POST['id'];

    if (alter_usuario($conexao, $nome_usuario, $senha_usuario,$ID)) {
        header("Location: ../usuario.php?alter=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../usuario.php?alter=0&error={$msg}");
        die();
    }
