<?php
    include '../bd_control/conecta.php';
    include 'empresa_control.php';

    $cnpj = $_POST['empresa_cnpj'];
    $nome_empresa = $_POST['empresa_nome'];
    $telefone = $_POST['empresa_telefone'];
    $cnpj_antigo = $_POST['cnpj_antigo'];

    if (alter_empresa($conexao, $cnpj, $nome_empresa, $telefone, $cnpj_antigo)) {
        header("Location: ../empresa.php?alter=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../empresa.php?alter=0&error={$msg}");
        die();
    }
