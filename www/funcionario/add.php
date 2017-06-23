<?php
    include '../bd_control/conecta.php';
    include '../pessoa/pessoa_control.php';
    include 'funcionario_control.php';

    $nome_pessoa = $_POST['pessoa_nome'];
    $cpf = $_POST['pessoa_cpf'];
    $nasc = $_POST['pessoa_nascimento'];
    $logradouro = $_POST['pessoa_logradouro'];
    $end_nome = $_POST['end_nome'];
    $end_num = $_POST['end_num'];
    $end_bairro = $_POST['end_bairro'];
    $end_cep = $_POST['end_cep'];
    $id_cidade = $_POST['id_cidade'];

    $tel = $_POST['funcionario_telefone'];
    $supervisor = $_POST['supervisor'];
    
    $usar_pessoa = $_POST['usar_pessoa'];

    if ($usar_pessoa == 1) {
        if ((insert_funcionario($conexao, $cpf, $tel)) && (define_supervisor($conexao, $cpf, $supervisor))) {
            header("Location: ../funcionario/funcionario_add.php?add=1");
            die();
        } else {
            $msg = mysqli_error($conexao);
            header("Location: ../funcionario/funcionario_add.php?add=0&error={$msg}");
            die();
        }
    } else{
        if ((insert_pessoa($conexao, $cpf, $nome_pessoa, $nasc)) && (insert_end($conexao, $cpf, $logradouro, $end_nome, $end_num, $end_bairro, $end_cep, $id_cidade)) && (insert_funcionario($conexao, $cpf, $tel))) {
            header("Location: ../funcionario/funcionario_add.php?add=1");
            die();
        } else {
            $msg = mysqli_error($conexao);
            header("Location: ../funcionario/funcionario_add.php?add=0&error={$msg}");
            die();
        }
    }
