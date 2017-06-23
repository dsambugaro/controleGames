<?php
    include '../bd_control/conecta.php';
    include 'usuario_control.php';
    $nome_usuario = $_POST['usuario_nome'];
    $senha_usuario = $_POST['usuario_senha'];
    $senhaAntiga = $_POST['senhaCrip'];
    $troca_senha = $_POST['troca_senha'];
    $senhaCrip = ($troca_senha == 1) ? md5($senha_usuario):$senhaAntiga;
    $ID = $_POST['id'];

    if (alter_usuario($conexao, $nome_usuario, $senhaCrip, $ID)) {
        header("Location: ../usuario.php?alter=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../usuario.php?alter=0&error={$msg}");
        die();
    }
