<?php
    $referencia = nome_pessoa;
    $table = PESSOA;
    $key = CPF;
    $tableMin = strtolower($table);
    $tratamento = a;

    function insert_pessoa($conexao, $cpf, $nome_pessoa, $nasc){
        $insert_pessoa = "INSERT INTO PESSOA(`CPF`,`nome_pessoa`, `data_nasc_pessoa`) VALUES('{$cpf}','{$nome_pessoa}', '{$nasc}');";
        return mysqli_query($conexao, $insert_pessoa);
    }

    function insert_end($conexao, $cpf, $logradouro, $end_nome, $end_num, $end_bairro, $end_cep, $id_cidade){
        $insert_end = "INSERT INTO ENDERECO VALUES('{$cpf}', '{$logradouro}', '{$end_nome}', {$end_num}, '{$end_bairro}', {$end_cep}, {$id_cidade});";
        return mysqli_query($conexao, $insert_end);
    }

    function alter_pessoa($conexao, $cpf, $nome_pessoa, $nasc, $id){
        $alter = "UPDATE PESSOA SET nome_pessoa = '{$nome_pessoa}', data_nasc_pessoa = '{$nasc}', CPF = {$cpf} WHERE CPF = {$id}";
        return mysqli_query($conexao, $alter);
    }

    function alter_end($conexao, $cpf, $logradouro, $end_nome, $end_num, $end_bairro, $end_cep, $id_cidade){
        $alter = "UPDATE ENDERECO SET logradouro = '{$logradouro}', nome = '{$end_nome}', numero = {$end_num}, bairro = '{$end_bairro}', CEP = {$end_cep}, CIDADE_ID = {$id_cidade}  WHERE PESSOA_CPF = {$cpf}";
        return mysqli_query($conexao, $alter);
    }

    function remove_pessoa($conexao, $ID){
        $delete = "DELETE FROM PESSOA WHERE CPF = {$ID}";
        return mysqli_query($conexao, $delete);
    }


    function selecionaTuplaEndereco($conexao, $cpf){
        $selectTupla = "SELECT E.*, C.nome as cidade, ES.ID as estado_id, ES.nome as estado FROM ENDERECO E
                        JOIN CIDADE C ON E.CIDADE_ID = C.ID
                        JOIN ESTADO ES ON ES.ID = C.ESTADO_ID
                        WHERE E.PESSOA_CPF = {$cpf}";
        $resultado = mysqli_query($conexao, $selectTupla);
        return mysqli_fetch_assoc($resultado);
    }

    function seleciona_tupla_pessoa($conexao, $tabela, $ID){
        $select = "SELECT * FROM {$tabela} WHERE CPF = {$ID}";
        $resultado = mysqli_query($conexao, $select);
        return mysqli_fetch_assoc($resultado);
    }

    function busca_por_nascimento($conexao, $campo, $buscar){
        $resultados = array();
        $busca = "SELECT C.*, E.nome as estado FROM PESSOA C JOIN ESTADO E ON C.ESTADO_ID = E.ID WHERE C.{$campo} LIKE '%{$buscar}%' ORDER BY C.{$campo}";
        $resultado = mysqli_query($conexao, $busca);
        while ($retorno = mysqli_fetch_assoc($resultado)) {
            array_push($resultados, $retorno);
        }
        return $resultados;
    }
