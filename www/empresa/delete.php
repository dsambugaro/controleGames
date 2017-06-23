<?php
    include '../bd_control/conecta.php';
    include 'empresa_control.php';

    $cnpj = $_POST['delete'];

    if (remove_empresa($conexao, $cnpj)) {
        header("Location: ../empresa.php?remove=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../empresa.php?remove=0&error={$msg}");
        die();
    }
