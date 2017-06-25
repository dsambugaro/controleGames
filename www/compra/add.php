<?php
    include '../bd_control/conecta.php';
    include 'compra_control.php';


    $jogos = $_POST['jogos'];
    $jogos = explode(',', $jogos);
    $quant = $_POST['qnt_jogos'];
    $quant = json_decode($quant, true);
    $preco = $_POST['preco_jogos'];
    $preco = json_decode($preco, true);

    $supervisor = $_POST['supervisor'];
    $valor_total = $_POST['valor_total'];
    $empresa = $_POST['empresa'];

    if ((insert_compra($conexao, $valor_total, $empresa, $supervisor)) && (produtos_compra($conexao, $jogos, $quant, $preco))) {
        header("Location: ../compra/compra_add.php?add=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../compra/compra_add.php?add=0&error={$msg}");
        echo "{$msg}";
        die();
    }
