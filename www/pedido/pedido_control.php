<?php
    $referencia = ID;
    $table = PEDIDO;
    $key = ID;
    $tableMin = strtolower($table);
    $tratamento = o;

    function lista_pedido($conexao){
        $rows = array();
        $select = "SELECT P.ID, P.data, P.valor_total, U.user
                    FROM PEDIDO P
                    JOIN CLIENTE C ON C.PESSOA_CPF = P.CLIENTE_PESSOA_CPF
                    JOIN USUARIO U ON U.ID = C.usuario";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }

    function seleciona_tupla_pedido($conexao, $ID){
        $rows = array();
        $select = "SELECT P.*, U.user
                    FROM PEDIDO P
                    JOIN CLIENTE C ON C.PESSOA_CPF = P.CLIENTE_PESSOA_CPF
                    JOIN USUARIO U ON U.ID = C.usuario
                    WHERE P.ID = {$ID}";
        $resultado = mysqli_query($conexao, $select);
        return mysqli_fetch_assoc($resultado);
    }

    function seleciona_jogos_pedido($conexao, $ID){
        $rows = array();
        $select = "SELECT PC.*, J.titulo, J.preco FROM PEDIDO_CONTEM PC
                    JOIN JOGO J ON J.codigo = PC.JOGO_codigo
                    WHERE PC.PEDIDO_ID = {$ID}";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }

    function insert_pedido($conexao, $frete, $valor_total, $metodo_pagamento, $cliente){
        $insert = "INSERT INTO PEDIDO (`frete`, `data`, `valor_total`, `metodo_pagamento`, `CLIENTE_PESSOA_CPF`)
                    VALUES({$frete}, CURRENT_DATE(), {$valor_total}, {$metodo_pagamento}, '{$cliente}')";
        return mysqli_query($conexao, $insert);
    }

    function produtos_pedido($conexao, $jogos, $quant){
        foreach ($jogos as $jogo) {
            $qnt = $quant[$jogo];
            $insert = "INSERT INTO PEDIDO_CONTEM VALUES ((SELECT MAX(ID) FROM PEDIDO), {$jogo}, {$qnt})";
            if (!(mysqli_query($conexao, $insert))) {
                return false;
            }
        }
        return true;
    }

    function alter_pedido($conexao, $frete, $valor_total, $metodo_pagamento, $ID){
        $update = "UPDATE PEDIDO SET frete = {$frete}, valor_total = {$valor_total}, metodo_pagamento = {$metodo_pagamento} WHERE ID = {$ID}";
        return mysqli_query($conexao, $update);
    }

    function alter_produtos_pedido($conexao, $jogos, $quant, $ID){
        foreach ($jogos as $jogo) {
            $qnt = $quant[$jogo];
            $update = "UPDATE PEDIDO_CONTEM SET quantidade =  {$qnt}
                        WHERE PEDIDO_ID = {$ID}
                        AND JOGO_codigo = {$jogo}";
            if (!(mysqli_query($conexao, $update))) {
                return false;
            }
        }
        return true;
    }

    function remove_produtos_pedido($conexao, $ID){
        $delete = "DELETE FROM PEDIDO_CONTEM WHERE PEDIDO_ID = {$ID}";
        return mysqli_query($conexao, $delete);
    }

    function remove_pedido($conexao, $ID){
        $delete = "DELETE FROM PEDIDO WHERE ID = {$ID}";
        return mysqli_query($conexao, $delete);
    }
