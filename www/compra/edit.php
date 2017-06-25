<?php
    include '../bd_control/conecta.php';
    include 'compra_control.php';

    $ID = $_POST['ID'];
    $quant = $_POST['qnt_jogos'];
    $quant = json_decode($quant, true);
    $jogos = $_POST['jogos'];
    $jogos_antigos = $_POST['jogos_antigo'];
    $preco = $_POST['preco_jogos'];
    $preco = json_decode($preco, true);
    $empresa = $_POST['empresa'];

    $valor_total = $_POST['valor_total'];

    if (alter_compra($conexao, $valor_total, $empresa, $ID)) {
        if ((strcmp($jogos_antigos, $jogos) == 0)) {
            $jogos = explode(',', $jogos);
            if (alter_produtos_compra($conexao, $jogos, $quant, $ID, $preco)) {
                header("Location: ../compra.php?alter=1");
                die();
            } else {
                $msg = mysqli_error($conexao);
                header("Location: ../compra.php?alter=0&error={$msg}");
                echo "{$msg}";
                die();
            }
        } else {
            $jogos = explode(',', $jogos);
            if (remove_produtos_compra($conexao, $ID)) {
                if (produtos_compra($conexao, $jogos, $quant, $preco)) {
                    header("Location: ../compra.php?alter=1");
                    die();
                } else {
                    $msg = mysqli_error($conexao);
                    header("Location: ../compra.php?alter=0&error={$msg}");
                    echo "{$msg}";
                    die();
                }
            } else {
                $msg = mysqli_error($conexao);
                header("Location: ../compra.php?alter=0&error={$msg}");
                echo "{$msg}";
                die();
            }
        }
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../compra.php?alter=0&error={$msg}");
        echo "{$msg}";
        die();
    }
