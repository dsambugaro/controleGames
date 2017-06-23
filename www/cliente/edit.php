<?php
    include '../bd_control/conecta.php';
    include '../usuario/usuario_control.php';
    include '../pessoa/pessoa_control.php';
    include 'cliente_control.php';

    $nome_pessoa = $_POST['pessoa_nome'];
    $cpf = $_POST['pessoa_cpf'];
    $id = $_POST['id_antigo'];
    $nasc = $_POST['pessoa_nascimento'];
    $logradouro = $_POST['pessoa_logradouro'];
    $end_nome = $_POST['end_nome'];
    $end_num = $_POST['end_num'];
    $end_bairro = $_POST['end_bairro'];
    $end_cep = $_POST['end_cep'];
    $id_cidade = $_POST['id_cidade'];

    $user = $_POST['cliente_user'];
    $senha = $_POST['cliente_password'];
    $senhaAntiga = $_POST['senhaCrip'];
    $troca_senha = $_POST['troca_senha'];
    $senhaCrip = ($troca_senha == 1) ? md5($senha):$senhaAntiga;
    $id_user = $_POST['id_user'];

    $email = $_POST['cliente_email'];

    if ((alter_pessoa($conexao, $cpf, $nome_pessoa, $nasc, $id)) && (alter_end($conexao, $cpf, $logradouro, $end_nome, $end_num, $end_bairro, $end_cep, $id_cidade)) && (alter_usuario($conexao, $user, $senhaCrip, $id_user)) && (alter_cliente($conexao, $cpf, $user, $email))) {
        header("Location: ../cliente.php?alter=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../cliente.php?alter=0&error={$msg}");
        die();
    }
