<?php
    $referencia = ID;
    $table = COMPRA;
    $key = ID;
    $tableMin = strtolower($table);
    $tratamento = a;

    function lista_compra($conexao){
        $rows = array();
        $select = "SELECT C.ID, C.data, C.preco_total, U.user, E.nome
                    FROM COMPRA C
                    JOIN SUPERVISOR S ON S.FUNCIONARIO_PESSOA_CPF = C.SUPERVISOR_FUNCIONARIO_PESSOA_CPF
                    JOIN USUARIO U ON U.ID = S.usuario
                    JOIN EMPRESA E ON E.CNPJ = C.EMPRESA_CNPJ";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }

    function seleciona_tupla_compra($conexao, $ID){
        $rows = array();
        $select = "SELECT C.*, U.user, E.nome, S.FUNCIONARIO_PESSOA_CPF
                    FROM COMPRA C
                    JOIN SUPERVISOR S ON S.FUNCIONARIO_PESSOA_CPF = C.SUPERVISOR_FUNCIONARIO_PESSOA_CPF
                    JOIN USUARIO U ON U.ID = S.usuario
                    JOIN EMPRESA E ON E.CNPJ = C.EMPRESA_CNPJ
                    WHERE C.ID = {$ID}";
        $resultado = mysqli_query($conexao, $select);
        return mysqli_fetch_assoc($resultado);
    }

    function seleciona_jogos_compra($conexao, $ID){
        $rows = array();
        $select = "SELECT CC.*, J.titulo, CC.preco_unit AS preco FROM COMPRA_CONTEM CC
                    JOIN JOGO J ON J.codigo = CC.JOGO_codigo
                    WHERE CC.COMPRA_ID = {$ID}";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }

    function insert_compra($conexao, $valor_total, $empresa, $supervisor){
        $insert = "INSERT INTO COMPRA (`preco_total`, `data`, `EMPRESA_CNPJ`, `SUPERVISOR_FUNCIONARIO_PESSOA_CPF`)
                    VALUES({$valor_total}, CURRENT_DATE(), '{$empresa}', '{$supervisor}')";
        return mysqli_query($conexao, $insert);
    }

    function produtos_compra($conexao, $jogos, $quant, $preco){
        foreach ($jogos as $jogo) {
            $qnt = $quant[$jogo];
            $valor = $preco[$jogo];
            $insert = "INSERT INTO COMPRA_CONTEM VALUES ( {$jogo}, (SELECT MAX(ID) FROM COMPRA), {$qnt}, {$valor})";
            if (!(mysqli_query($conexao, $insert))) {
                return false;
            }
        }
        return true;
    }

    function alter_compra($conexao, $valor_total, $empresa, $ID){
        $update = "UPDATE COMPRA SET preco_total = {$valor_total} WHERE ID = {$ID}";
        return mysqli_query($conexao, $update);
    }

    function alter_produtos_compra($conexao, $jogos, $quant, $ID, $preco){
        foreach ($jogos as $jogo) {
            $qnt = $quant[$jogo];
            $valor = $preco[$jogo];
            $update = "UPDATE COMPRA_CONTEM SET quantidade =  {$qnt}, preco_unit = {$valor}
                        WHERE COMPRA_ID = {$ID}
                        AND JOGO_codigo = {$jogo}";
            if (!(mysqli_query($conexao, $update))) {
                return false;
            }
        }
        return true;
    }

    function remove_produtos_compra($conexao, $ID){
        $delete = "DELETE FROM COMPRA_CONTEM WHERE COMPRA_ID = {$ID}";
        return mysqli_query($conexao, $delete);
    }

    function remove_compra($conexao, $ID){
        $delete = "DELETE FROM COMPRA WHERE ID = {$ID}";
        return mysqli_query($conexao, $delete);
    }

    function busca_auto_completa_compra($conexao, $campo, $buscar){
        $busca = "SELECT C.ID, C.data, C.preco_total, U.user, E.nome
                    FROM COMPRA C
                    JOIN SUPERVISOR S ON S.FUNCIONARIO_PESSOA_CPF = C.SUPERVISOR_FUNCIONARIO_PESSOA_CPF
                    JOIN USUARIO U ON U.ID = S.usuario
                    JOIN EMPRESA E ON E.CNPJ = C.EMPRESA_CNPJ
                    WHERE {$campo} LIKE '%{$buscar}%'
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

    function busca_compra($conexao, $campo, $buscar){
        $resultados = array();
        $busca = "SELECT C.ID, C.data, C.preco_total, U.user, E.nome
                    FROM COMPRA C
                    JOIN SUPERVISOR S ON S.FUNCIONARIO_PESSOA_CPF = C.SUPERVISOR_FUNCIONARIO_PESSOA_CPF
                    JOIN USUARIO U ON U.ID = S.usuario
                    JOIN EMPRESA E ON E.CNPJ = C.EMPRESA_CNPJ
                    WHERE {$campo} LIKE '%{$buscar}%'
                    ORDER BY {$campo}";
        $resultado = mysqli_query($conexao, $busca);
        while ($res = mysqli_fetch_assoc($resultado)) {
            array_push($resultados, $res);
        }
        return $resultados;
    }
