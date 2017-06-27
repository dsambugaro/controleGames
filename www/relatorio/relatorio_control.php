<?php
    function relatorio_1($conexao, $data1, $data2){ //Jogos mais vendidos entre:
        $rows = array();
        $select = "SELECT J.codigo, J.titulo, J.preco, E.nome, SUM(quantidade) AS copias_vendidas
                    FROM JOGO J
                    JOIN PEDIDO_CONTEM PC ON J.codigo = PC.JOGO_codigo
                    JOIN EMPRESA E ON J.EMPRESA_CNPJ = E.CNPJ
                    WHERE PC.PEDIDO_ID IN (SELECT P.ID FROM PEDIDO P
                                            WHERE P.data BETWEEN CAST('{$data1}' AS DATE) AND CAST('{$data2}' AS DATE))
                    GROUP BY J.codigo
                    ORDER BY copias_vendidas DESC";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }

    function relatorio_2($conexao, $data1, $data2){ //Clientes que compraram o maior valor
        $rows = array();
        $select = "SELECT C.PESSOA_CPF, PE.nome_pessoa, U.user, SUM(valor_total) AS total_gasto
                    FROM CLIENTE C
                    JOIN PEDIDO P ON C.PESSOA_CPF = P.CLIENTE_PESSOA_CPF
                    JOIN PESSOA PE ON PE.CPF = C.PESSOA_CPF
                    JOIN USUARIO U ON U.ID = C.usuario
                    WHERE P.data BETWEEN CAST('{$data1}' AS DATE) AND CAST('{$data2}' AS DATE)
                    GROUP BY C.PESSOA_CPF
                    ORDER BY total_gasto DESC";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }

    function relatorio_3($conexao, $metodo){ //Clientes que pagaram através de:
        $rows = array();
        $select = "SELECT C.PESSOA_CPF, P.nome_pessoa, U.user
                    FROM CLIENTE C
                    JOIN PESSOA P ON P.CPF = C.PESSOA_CPF
                    JOIN USUARIO U ON U.ID = C.usuario
                    WHERE C.PESSOA_CPF IN (SELECT P.CLIENTE_PESSOA_CPF FROM PEDIDO P
                                            WHERE metodo_pagamento = {$metodo})
                    GROUP BY C.PESSOA_CPF";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }

    function relatorio_4($conexao, $data){ //Clientes que não realizaram compras após:
        $rows = array();
        $select = "SELECT C.PESSOA_CPF, P.nome_pessoa, U.user,  MAX(PE.data) AS data
                    FROM CLIENTE C
                    JOIN PESSOA P ON P.CPF = C.PESSOA_CPF
                    JOIN USUARIO U ON U.ID = C.usuario
                    JOIN PEDIDO PE ON PE.CLIENTE_PESSOA_CPF = C.PESSOA_CPF
                    WHERE C.PESSOA_CPF NOT IN (SELECT P1.CLIENTE_PESSOA_CPF
                                                FROM PEDIDO P1
                                                WHERE P1.data > CAST('{$data}' AS DATE))
                    AND C.PESSOA_CPF IN (SELECT P2.CLIENTE_PESSOA_CPF FROM PEDIDO P2)
                    GROUP BY C.PESSOA_CPF
                    ORDER BY data DESC";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }

    function relatorio_5($conexao){ //Clientes que nunca realizaram compras
        $rows = array();
        $select = "SELECT C.PESSOA_CPF, P.nome_pessoa, U.user
                    FROM CLIENTE C
                    JOIN PESSOA P ON P.CPF = C.PESSOA_CPF
                    JOIN USUARIO U ON U.ID = C.usuario
                    WHERE C.PESSOA_CPF NOT IN (SELECT P.CLIENTE_PESSOA_CPF FROM PEDIDO P)";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }

    function relatorio_6($conexao, $cidade, $estado){ //Clientes que moram em:
        $rows = array();
        $select = "SELECT C.PESSOA_CPF, P.nome_pessoa, U.user, C1.nome
                    FROM CLIENTE C
                    JOIN PESSOA P ON P.CPF = C.PESSOA_CPF
                    JOIN USUARIO U ON U.ID = C.usuario
                    JOIN ENDERECO E ON E.PESSOA_CPF = C.PESSOA_CPF
                    JOIN CIDADE C1 ON E.CIDADE_ID = C1.ID
                    WHERE C.PESSOA_CPF IN (SELECT E.PESSOA_CPF FROM ENDERECO E
                                            JOIN CIDADE C ON E.CIDADE_ID = C.ID
                                            JOIN ESTADO ES ON ES.ID = C.ESTADO_ID
                                            WHERE ES.ID = {$estado} AND C.nome LIKE '%{$cidade}%')";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }

    function relatorio_7($conexao){ //Empresas que possuem mais jogos cadastrados
        $rows = array();
        $select = "SELECT E.CNPJ, E.nome, E.telefone, COUNT(*) AS jogos_cadastrados
                    FROM EMPRESA E
                    JOIN JOGO J ON J.EMPRESA_CNPJ = E.CNPJ
                    GROUP BY E.CNPJ
                    ORDER BY jogos_cadastrados DESC";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }

    function relatorio_8($conexao){ //Empresas que possuem mais jogos vendidos
        $rows = array();
        $select = "SELECT E.CNPJ, E.nome, E.telefone, SUM(quantidade) AS jogos_vendidos
                    FROM EMPRESA E
                    JOIN JOGO J ON J.EMPRESA_CNPJ = E.CNPJ
                    JOIN PEDIDO_CONTEM PC ON PC.JOGO_codigo = J.codigo
                    GROUP BY E.CNPJ
                    ORDER BY jogos_vendidos DESC";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }

    function relatorio_9($conexao, $data1, $data2){ //Supervisores que realizaram compras entre:
        $rows = array();
        $select = "SELECT S.FUNCIONARIO_PESSOA_CPF, P.nome_pessoa, U.user, F.cracha
                    FROM SUPERVISOR S
                    JOIN FUNCIONARIO F ON S.FUNCIONARIO_PESSOA_CPF = F.PESSOA_CPF
                    JOIN PESSOA P ON P.CPF = S.FUNCIONARIO_PESSOA_CPF
                    JOIN USUARIO U ON U.ID = S.usuario
                    WHERE S.FUNCIONARIO_PESSOA_CPF IN (SELECT C.SUPERVISOR_FUNCIONARIO_PESSOA_CPF FROM COMPRA C
                                                        WHERE C.data BETWEEN CAST('{$data1}' AS DATE) AND CAST('{$data2}' AS DATE))";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }

    function relatorio_10($conexao, $data1, $data2){ //Estados com o maior número de pedidos
        $rows = array();
        $select = "SELECT E.*, COUNT(*) AS numero_pedidos
                    FROM ESTADO E
                    JOIN CIDADE C ON C.ESTADO_ID = E.ID
                    JOIN ENDERECO EN ON C.ID = EN.CIDADE_ID
                    JOIN PEDIDO P ON P.CLIENTE_PESSOA_CPF = EN.PESSOA_CPF
                    WHERE P.ID IN (SELECT P2.ID FROM PEDIDO P2
                                            WHERE P2.data BETWEEN CAST('{$data1}' AS DATE) AND CAST('{$data2}' AS DATE))
                    GROUP BY E.ID
                    ORDER BY numero_pedidos DESC";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }
