<?php
    include '../bd_control/conecta.php';
    include 'pessoa_control.php';

    $nome_pessoa = $_POST['pessoa_nome'];
    $cpf = $_POST['pessoa_cpf'];
    $nasc = $_POST['pessoa_nascimento'];
    $logradouro = $_POST['pessoa_logradouro'];
    $end_nome = $_POST['end_nome'];
    $end_num = $_POST['end_num'];
    $end_bairro = $_POST['end_bairro'];
    $end_cep = $_POST['end_cep'];
    $id_cidade = $_POST['id_cidade'];

    if ((insert_pessoa($conexao, $cpf, $nome_pessoa, $nasc)) && (insert_end($conexao, $cpf, $logradouro, $end_nome, $end_num, $end_bairro, $end_cep, $id_cidade))) {
        header("Location: ../pessoa/pessoa_add.php?add=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../pessoa/pessoa_add.php?add=0&error={$msg}");
        die();

    }
