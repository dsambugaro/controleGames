<?php
    include '../bd_control/conecta.php';
    include '../usuario/usuario_control.php';
    include 'supervisor_control.php';

    $cracha = $_POST['funcionario_selecionado'];
    $cpf = $_POST['cpf'];
    $user = $_POST['supervisor_user'];
    $senha = $_POST['supervisor_password'];
    $senhaCrip = md5($senha);
    $senhaAntiga = $_POST['senhaCrip'];
    $troca_senha = $_POST['troca_senha'];
    $senhaCrip = ($troca_senha == 1) ? md5($senha):$senhaAntiga;
    $id_user = $_POST['id_user'];

    if ((alter_usuario($conexao, $user, $senhaCrip, $id_user)) && (alter_supervisor($conexao, $cracha, $user, $cpf))) {
        header("Location: ../supervisor.php?alter=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../supervisor.php?alter=0&error={$msg}");
        die();
    }
