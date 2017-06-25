<?php
    $referencia = cracha;
    $table = SUPERVISOR;
    $key = FUNCIONARIO_PESSOA_CPF;
    $tableMin = strtolower($table);
    $tratamento = o;

    function lista_supervisores($conexao){
        $rows = array();
        $select = "SELECT S.*, P.nome_pessoa AS nome, U.user AS user, F.cracha AS cracha
                    FROM SUPERVISOR S
                    JOIN USUARIO U ON U.ID = S.usuario
                    JOIN FUNCIONARIO F ON F.PESSOA_CPF = S.FUNCIONARIO_PESSOA_CPF
                    JOIN PESSOA P ON S.FUNCIONARIO_PESSOA_CPF = P.CPF";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }

    function seleciona_tupla_supervisor($conexao, $ID){
        $rows = array();
        $select = "SELECT S.*, P.nome_pessoa AS nome, U.user AS user, U.senha AS senha, F.cracha AS cracha
                    FROM SUPERVISOR S
                    JOIN USUARIO U ON U.ID = S.usuario
                    JOIN FUNCIONARIO F ON F.PESSOA_CPF = S.FUNCIONARIO_PESSOA_CPF
                    JOIN PESSOA P ON S.FUNCIONARIO_PESSOA_CPF = P.CPF
                    WHERE S.FUNCIONARIO_PESSOA_CPF = {$ID}";
        $resultado = mysqli_query($conexao, $select);
        $rows = mysqli_fetch_assoc($resultado);
        return $rows;
    }

    function insert_supervisor($conexao, $cracha, $usuario){
        $insert = "INSERT INTO SUPERVISOR VALUES ((SELECT ID FROM USUARIO WHERE user = '{$usuario}'), (SELECT PESSOA_CPF FROM FUNCIONARIO WHERE cracha = {$cracha}))";
        return mysqli_query($conexao, $insert);
    }

    function alter_supervisor($conexao, $cracha, $usuario, $cpf){
        $alter = "UPDATE SUPERVISOR SET usuario = (SELECT ID FROM USUARIO WHERE user = '{$usuario}'), FUNCIONARIO_PESSOA_CPF = (SELECT PESSOA_CPF FROM FUNCIONARIO WHERE cracha = {$cracha})
                    WHERE FUNCIONARIO_PESSOA_CPF = '{$cpf}'";
        return mysqli_query($conexao, $alter);
    }

    function remove_supervisor($conexao, $ID){
        $delete = "DELETE FROM SUPERVISOR WHERE FUNCIONARIO_PESSOA_CPF = {$ID}";
        return mysqli_query($conexao, $delete);
    }

    function busca_auto_completa_supervisor($conexao, $campo, $buscar){
        $busca = "SELECT {$campo} FROM SUPERVISOR S, PESSOA P
                    WHERE {$campo} LIKE '%{$buscar}%'
                    AND P.CPF = S.FUNCIONARIO_PESSOA_CPF
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

    function busca_supervisor($conexao, $campo, $buscar){
        $resultados = array();
        $busca = "SELECT S.*, P.nome_pessoa AS nome, U.user AS user, F.cracha AS cracha
                    FROM SUPERVISOR S
                    JOIN USUARIO U ON U.ID = S.usuario
                    JOIN FUNCIONARIO F ON F.PESSOA_CPF = S.FUNCIONARIO_PESSOA_CPF
                    JOIN PESSOA P ON S.FUNCIONARIO_PESSOA_CPF = P.CPF
                   WHERE {$campo} LIKE '%{$buscar}%'
                   ORDER BY {$campo}";
        $resultado = mysqli_query($conexao, $busca);
        while ($res = mysqli_fetch_assoc($resultado)) {
            array_push($resultados, $res);
        }
        return $resultados;
    }
