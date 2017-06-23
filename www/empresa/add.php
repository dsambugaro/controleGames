<?php
    include '../bd_control/conecta.php';
    include 'empresa_control.php';

    $cnpj = $_POST['empresa_cnpj'];
    $nome_empresa = $_POST['empresa_nome'];
    $telefone = $_POST['empresa_telefone'];

    if (insert_empresa($conexao, $cnpj, $nome_empresa, $telefone)) {
        header("Location: ../empresa/empresa_add.php?add=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../empresa/empresa_add.php?add=0&error={$msg}");
        die();

    }
