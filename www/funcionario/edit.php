<?php

    include '../bd_control/conecta.php';
    include '../usuario/usuario_control.php';
    include '../pessoa/pessoa_control.php';
    include 'funcionario_control.php';

    $nome_pessoa = $_POST['pessoa_nome'];
    $cpf = $_POST['pessoa_cpf'];
    $nasc = $_POST['pessoa_nascimento'];
    $id = $_POST['id_antigo'];
    $logradouro = $_POST['pessoa_logradouro'];
    $end_nome = $_POST['end_nome'];
    $end_num = $_POST['end_num'];
    $end_bairro = $_POST['end_bairro'];
    $end_cep = $_POST['end_cep'];
    $id_cidade = $_POST['id_cidade'];

    $tel = $_POST['funcionario_telefone'];
    $supervisor = $_POST['supervisor'];

    if ((alter_pessoa($conexao, $cpf, $nome_pessoa, $nasc, $id)) && (alter_end($conexao, $cpf, $logradouro, $end_nome, $end_num, $end_bairro, $end_cep, $id_cidade)) && (alter_funcionario($conexao, $cpf, $tel))) {
        header("Location: ../funcionario.php?alter=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../funcionario.php?alter=0&error={$msg}");
        die();
    }
