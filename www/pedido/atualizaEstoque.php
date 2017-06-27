<?php
    include '../bd_control/conecta.php';
    include 'pedido_control.php';

    $acao = $_POST['acao'];

    if ($acao == 1) {
        $codigo = $_POST['codigo'];
        $quantidade = $_POST['quantidade'];
        if (atualizaEstoque($conexao, $codigo, $quantidade)) {
            echo "Estoque atualizado com sucesso!";
        } else {
            $msg = mysqli_error($conexao);
            echo "Não foi possivel atualizar estoque";
            echo "<br>";
            echo "Erro: ";
            echo "{$msg}";
        }
    } else {
        $codigos = $_POST['codigo'];
        $codigos = explode(',', $codigos);
        $quant = $_POST['quantidade'];
        $quant = json_decode($quant, true);
        var_dump($quant);
        var_dump($codigos);
        foreach ($codigos as $codigo) {
            if (atualizaEstoque2($conexao, $codigo, $quant[$codigo])) {
                echo "Quantidade de {$codigo} atualizada com sucesso!";
            } else {
                $msg = mysqli_error($conexao);
                echo "Não foi possivel atualizar estoque";
                echo "<br>";
                echo "Erro: ";
                echo "{$msg}";
            }
        }
    }
