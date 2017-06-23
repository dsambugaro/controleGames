<?php
    $referencia = nome;
    $table = EMPRESA;
    $key = CNPJ;
    $tableMin = strtolower($table);
    $tratamento = a;

    function insert_empresa($conexao, $cnpj, $nome_empresa, $telefone){
        $insert_empresa = "INSERT INTO EMPRESA VALUES ('{$cnpj}', '{$nome_empresa}', {$telefone})";
        return mysqli_query($conexao, $insert_empresa);
    }

    function alter_empresa($conexao, $cnpj, $nome_empresa, $telefone, $cnpj_antigo){
        $alter = "UPDATE EMPRESA SET CNPJ = '{$cnpj}', nome = '{$nome_empresa}', telefone = '{$telefone}'
                    WHERE CNPJ = {$cnpj_antigo}";
        return mysqli_query($conexao, $alter);
    }

    function remove_empresa($conexao, $cnpj){
        $delete = "DELETE FROM EMPRESA WHERE CNPJ = {$cnpj}";
        return mysqli_query($conexao, $delete);
    }

    function seleciona_tupla_empresa($conexao, $tabela, $ID){
        $select = "SELECT * FROM {$tabela} WHERE CNPJ = {$ID}";
        $resultado = mysqli_query($conexao, $select);
        return mysqli_fetch_assoc($resultado);
    }
