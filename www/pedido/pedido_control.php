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

    function atualizaEstoque($conexao, $codigo, $quantidade){
        $pega_quantidade = "SELECT J.qtd_estoque FROM JOGO J WHERE codigo = '{$codigo}'";
        $query = mysqli_query($conexao, $pega_quantidade);
        $quantidade_atual = mysqli_fetch_assoc($query);
        $quantidade_nova = $quantidade + $quantidade_atual['qtd_estoque'];
        $alter = "UPDATE JOGO SET qtd_estoque = {$quantidade_nova} WHERE codigo = '{$codigo}'";
        return mysqli_query($conexao, $alter);
    }

    function atualizaEstoque2($conexao, $codigo, $quantidade){
        $pega_quantidade = "SELECT J.qtd_estoque FROM JOGO J WHERE codigo = '{$codigo}'";
        $query = mysqli_query($conexao, $pega_quantidade);
        $quantidade_atual = mysqli_fetch_assoc($query);
        $quantidade_nova = $quantidade_atual['qtd_estoque'] - $quantidade;
        echo $quantidade_atual['qtd_estoque'];
        echo "<br>";
        echo $quantidade;
        $alter = "UPDATE JOGO SET qtd_estoque = {$quantidade_nova} WHERE codigo = '{$codigo}'";
        return mysqli_query($conexao, $alter);
    }

    function busca_auto_completa_pedido($conexao, $campo, $buscar){
        $busca = "SELECT P.ID, P.data, P.valor_total, U.user
                    FROM PEDIDO P
                    JOIN CLIENTE C ON C.PESSOA_CPF = P.CLIENTE_PESSOA_CPF
                    JOIN USUARIO U ON U.ID = C.usuario
                    WHERE {$campo} LIKE '%{$buscar}%'
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

    function busca_pedido($conexao, $campo, $buscar){
        $resultados = array();
        $busca = "SELECT P.ID, P.data, P.valor_total, U.user
                    FROM PEDIDO P
                    JOIN CLIENTE C ON C.PESSOA_CPF = P.CLIENTE_PESSOA_CPF
                    JOIN USUARIO U ON U.ID = C.usuario
                    WHERE {$campo} LIKE '%{$buscar}%'
                    ORDER BY {$campo}";
        $resultado = mysqli_query($conexao, $busca);
        while ($res = mysqli_fetch_assoc($resultado)) {
            array_push($resultados, $res);
        }
        return $resultados;
    }
