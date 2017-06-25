<?php
    include '../bd_control/conecta.php';
    include '../usuario/usuario_control.php';
    include 'supervisor_control.php';

    $cracha = $_POST['funcionario_selecionado'];
    $user = $_POST['supervisor_user'];
    $senha = $_POST['supervisor_password'];
    $senhaCrip = md5($senha);

    if ((insert_usuario($conexao, $user, $senhaCrip)) && (insert_supervisor($conexao, $cracha, $user))) {
        header("Location: ../supervisor/supervisor_add.php?add=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../supervisor/supervisor_add.php?add=0&error={$msg}");
        die();
    }
