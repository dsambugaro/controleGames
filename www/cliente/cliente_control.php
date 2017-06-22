<?php
    $referencia = user;
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

    function busca_auto_completa_cliente($conexao, $campo, $buscar){
        $busca = "SELECT {$campo} FROM CLIENTE C, PESSOA P, USUARIO U
                    WHERE {$campo} LIKE '%{$buscar}%'
                    AND P.CPF = C.PESSOA_CPF
                    AND C.usuario = U.ID
                    GROUP BY {$campo}
                    ORDER BY {$campo}";
        $resultado = mysqli_query($conexao, $busca);
        $virgula = false;
        $retorna = '[';
        while ($res = mysqli_fetch_assoc($resultado)) {
            if ($virgula) {
                $retorna .= ', ';
            } else {
                $virgula = true;
            }
            $retorna .= json_encode($res["{$campo}"]);
        }
        $retorna .= ']';
        return $retorna;
    }

    function busca_cliente($conexao, $campo, $buscar){
        $resultados = array();
        $busca = "SELECT C.PESSOA_CPF, P.nome_pessoa AS nome, U.user AS user FROM CLIENTE C
                   JOIN PESSOA P ON C.PESSOA_CPF = P.CPF
                   JOIN USUARIO U ON C.usuario = U.ID
                   WHERE {$campo} LIKE '%{$buscar}%'
                   ORDER BY {$campo}";
        $resultado = mysqli_query($conexao, $busca);
        while ($res = mysqli_fetch_assoc($resultado)) {
            array_push($resultados, $res);
        }
        return $resultados;
    }
