<?php
    include '../bd_control/conecta.php';
    include 'pedido_control.php';


    $jogos = $_POST['jogos'];
    $quant = $_POST['qnt_jogos'];
    $quant = json_decode($quant, true);
    $jogos = explode(',', $jogos);

    $cliente = $_POST['cliente'];
    $frete = $_POST['frete'];
    $metodo_pagamento = $_POST['met_pag'];
    $valor_total = $_POST['valor_total'];

    if ((insert_pedido($conexao, $frete, $valor_total, $metodo_pagamento, $cliente)) && (produtos_pedido($conexao, $jogos, $quant))) {
        header("Location: ../pedido/pedido_add.php?add=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../pedido/pedido_add.php?add=0&error={$msg}");
        echo "{$msg}";
        die();
    }
