<?php
    $referencia = cracha;
    $table = FUNCIONARIO;
    $key = CPF;
    $tableMin = strtolower($table);
    $tratamento = o;

    function lista_funcionario($conexao){
        $rows = array();
        $select = "SELECT F.PESSOA_CPF AS CPF, F.cracha as cracha, P.nome_pessoa as nome, FP.SUPERVISOR_FUNCIONARIO_PESSOA_CPF as supervisor
                    FROM FUNCIONARIO F
                    JOIN PESSOA P ON F.PESSOA_CPF = P.CPF
                    JOIN FISCALIZADO_POR FP ON FP.FUNCIONARIO_PESSOA_CPF = F.PESSOA_CPF";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }

    function supervisor_nome($conexao, $cpf){
        $select = "SELECT P.nome_pessoa AS supervisor
                   FROM SUPERVISOR S
                   JOIN PESSOA P ON P.CPF = S.FUNCIONARIO_PESSOA_CPF
                   WHERE S.FUNCIONARIO_PESSOA_CPF = '{$cpf}'";
        $resultado = mysqli_query($conexao, $select);
        $selecionado = mysqli_fetch_assoc($resultado);
        return $selecionado['supervisor'];
    }

    function seleciona_tupla_funcionario($conexao, $ID){
        $select = "SELECT F.PESSOA_CPF AS CPF, F.cracha as cracha, P.nome_pessoa as nome, F.telefone, FP.SUPERVISOR_FUNCIONARIO_PESSOA_CPF as supervisor
                    FROM FUNCIONARIO F
                    JOIN PESSOA P ON F.PESSOA_CPF = P.CPF
                    JOIN FISCALIZADO_POR FP ON FP.FUNCIONARIO_PESSOA_CPF = F.PESSOA_CPF
                   WHERE PESSOA_CPF = '{$ID}'";
        $resultado = mysqli_query($conexao, $select);
        return mysqli_fetch_assoc($resultado);
    }

    function insert_funcionario($conexao, $cpf, $tel){
        $insert = "INSERT INTO FUNCIONARIO(`PESSOA_CPF`, `telefone`) VALUES ('{$cpf}', {$tel})";
        return mysqli_query($conexao, $insert);
    }

    function define_supervisor($conexao, $cpf, $supervisor){
        $insert = "INSERT INTO FISCALIZADO_POR VALUES ('{$cpf}', {$supervisor})";
        return mysqli_query($conexao, $insert);
    }

    function alter_funcionario($conexao, $cpf, $tel){
        $insert = "UPDATE FUNCIONARIO SET telefone = {$tel} WHERE PESSOA_CPF = '{$cpf}'";
        return mysqli_query($conexao, $insert);
    }

    function remove_funcionario($conexao, $ID){
        $delete = "DELETE FROM FUNCIONARIO WHERE PESSOA_CPF = {$ID}";
        return mysqli_query($conexao, $delete);
    }

    function busca_auto_completa_funcionario($conexao, $campo, $buscar){
        $busca = "SELECT {$campo} FROM FUNCIONARIO F, PESSOA P
                    WHERE {$campo} LIKE '%{$buscar}%'
                    AND P.CPF = F.PESSOA_CPF
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

    function busca_funcionario($conexao, $campo, $buscar){
        $resultados = array();
        $busca = "SELECT F.PESSOA_CPF AS CPF, F.cracha as cracha, P.nome_pessoa as nome, FP.SUPERVISOR_FUNCIONARIO_PESSOA_CPF as supervisor
                    FROM FUNCIONARIO F
                    JOIN PESSOA P ON F.PESSOA_CPF = P.CPF
                    JOIN FISCALIZADO_POR FP ON FP.FUNCIONARIO_PESSOA_CPF = F.PESSOA_CPF
                   WHERE {$campo} LIKE '%{$buscar}%'
                   ORDER BY {$campo}";
        $resultado = mysqli_query($conexao, $busca);
        while ($res = mysqli_fetch_assoc($resultado)) {
            array_push($resultados, $res);
        }
        return $resultados;
    }
