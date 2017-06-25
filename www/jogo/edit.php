<?php
    include '../bd_control/conecta.php';
    include 'jogo_control.php';

    $codigo = $_POST['jogo_cod'];
    $cod_antigo = $_POST['cod_antigo'];
    $titulo = $_POST['jogo_titulo'];
    $genero = $_POST['jogo_gen'];
    $plataforma = $_POST['jogo_plat'];
    $sinopse = $_POST['jogo_sinopse'];
    $lancamento = $_POST['jogo_lancamento'];
    $fxa_etaria = $_POST['jogo_faixa'];
    $preco = $_POST['jogo_preco'];
    $quantidade = $_POST['jogo_qntd'];
    $empresa = $_POST['jogo_empresa'];


    if (alter_jogo($conexao, $codigo, $titulo, $genero, $plataforma, $sinopse, $lancamento, $fxa_etaria, $preco, $quantidade, $empresa, $cod_antigo)) {
        header("Location: ../jogo.php?alter=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../jogo.php?alter=0&error={$msg}");
        die();
    }
