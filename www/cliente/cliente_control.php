<?php
    $referencia = PESSOA_CPF;
    $table = CLIENTE;
    $key = PESSOA_CPF;
    $tableMin = strtolower($table);
    $tratamento = o;


    function lista_cliente($conexao){
        $rows = array();
        $select = "SELECT C.*, P.nome_pessoa as nome, U.user as user FROM CLIENTE C
                   JOIN PESSOA P ON C.PESSOA_CPF = P.CPF
                   JOIN USUARIO U ON C.usuario = U.ID";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }

    function seleciona_tupla_cliente($conexao, $ID){
        $select = "SELECT C.*, U.user AS user, U.senha as senha FROM CLIENTE C
                   JOIN USUARIO U ON C.usuario = U.ID
                   WHERE PESSOA_CPF = '{$ID}'";
        $resultado = mysqli_query($conexao, $select);
        return mysqli_fetch_assoc($resultado);
    }

    function insert_cliente($conexao, $cpf, $user, $email){
        $insert = "INSERT INTO CLIENTE VALUES ('{$cpf}', (SELECT ID FROM USUARIO WHERE user = '{$user}'), NULL, '{$email}')";
        return mysqli_query($conexao, $insert);
    }

    function alter_cliente($conexao, $cpf, $user, $email){
        $insert = "UPDATE CLIENTE SET usuario = (SELECT ID FROM USUARIO WHERE user = '{$user}'), email = '{$email}' WHERE PESSOA_CPF = '{$cpf}'";
        return mysqli_query($conexao, $insert);
    }

    function remove_cliente($conexao, $ID){
        $delete = "DELETE FROM CLIENTE WHERE PESSOA_CPF = {$ID}";
        return mysqli_query($conexao, $delete);
    }

    function busca_dinamica_pessoa($conexao, $campo, $filtro){
        $resultados = array();
        $busca = "SELECT P.*, E.*, C.nome AS cidade, ES.ID AS estado_id, ES.nome AS estado FROM PESSOA P, ENDERECO E
                  JOIN CIDADE C ON E.CIDADE_ID = C.ID
                  JOIN ESTADO ES ON ES.ID = C.ESTADO_ID
                  WHERE P.{$campo} = '{$filtro}' AND E.PESSOA_CPF = P.CPF";
        $resultado = mysqli_query($conexao, $busca);
        while ($retorno = mysqli_fetch_assoc($resultado)) {
            array_push($resultados, $retorno);
        }
        return $resultados;
    }
