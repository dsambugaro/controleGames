<?php
    include '../bd_control/conecta.php';
    include '../pessoa/pessoa_control.php';
    include '../usuario/usuario_control.php';
    include 'cliente_control.php';

    $nome_pessoa = $_POST['pessoa_nome'];
    $cpf = $_POST['pessoa_cpf'];
    $nasc = $_POST['pessoa_nascimento'];
    $logradouro = $_POST['pessoa_logradouro'];
    $end_nome = $_POST['end_nome'];
    $end_num = $_POST['end_num'];
    $end_bairro = $_POST['end_bairro'];
    $end_cep = $_POST['end_cep'];
    $id_cidade = $_POST['id_cidade'];

    $user = $_POST['cliente_user'];
    $senha = $_POST['cliente_password'];
    $senhaCrip = md5($senha);

    $email = $_POST['cliente_email'];

    $usar_pessoa = $_POST['usar_pessoa'];

    if ($usar_pessoa == 1) {
        if ((insert_usuario($conexao, $user, $senhaCrip)) && (insert_cliente($conexao, $cpf, $user, $email))) {
            header("Location: ../cliente/cliente_add.php?add=1");
            die();
        } else {
            $msg = mysqli_error($conexao);
            header("Location: ../cliente/cliente_add.php?add=0&error={$msg}");
            die();
        }
    } else{
        if ((insert_pessoa($conexao, $cpf, $nome_pessoa, $nasc)) && (insert_end($conexao, $cpf, $logradouro, $end_nome, $end_num, $end_bairro, $end_cep, $id_cidade)) && (insert_usuario($conexao, $user, $senhaCrip)) && (insert_cliente($conexao, $cpf, $user, $email))) {
            header("Location: ../cliente/cliente_add.php?add=1");
            die();
        } else {
            $msg = mysqli_error($conexao);
            header("Location: ../cliente/cliente_add.php?add=0&error={$msg}");
            die();
        }
    }
