<?php
    $referencia = titulo;
    $table = JOGO;
    $key = codigo;
    $tableMin = strtolower($table);
    $tratamento = o;

    function lista_jogo($conexao){
        $rows = array();
        $select = "SELECT J.codigo, J.titulo, J.lancamento, E.nome
                    FROM JOGO J
                    JOIN EMPRESA E ON J.EMPRESA_CNPJ = E.CNPJ";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }

    function seleciona_tupla_jogo($conexao, $codigo){
        $select = "SELECT J.* FROM JOGO J
                    WHERE J.codigo = '{$codigo}'";
        $resultado = mysqli_query($conexao, $select);
        return mysqli_fetch_assoc($resultado);
    }

    function insert_jogo($conexao, $codigo, $titulo, $genero, $plataforma, $sinopse, $lancamento, $fxa_etaria, $preco, $quantidade, $empresa){
        $insert = "INSERT INTO JOGO VALUES ('{$codigo}', '{$titulo}', {$genero}, {$plataforma}, '{$sinopse}', '{$lancamento}', {$fxa_etaria}, {$preco}, {$quantidade}, {$empresa})";
        return mysqli_query($conexao, $insert);
    }

    function alter_jogo($conexao, $codigo, $titulo, $genero, $plataforma, $sinopse, $lancamento, $fxa_etaria, $preco, $quantidade, $empresa, $cod_antigo){
        $alter = "UPDATE JOGO SET codigo = '{$codigo}', titulo = '{$titulo}', genero = {$genero}, plataforma = {$plataforma}, sinopse = '{$sinopse}', lancamento = '{$lancamento}', faixa_etaria = {$fxa_etaria}, preco = {$preco}, qtd_estoque = {$quantidade}, EMPRESA_CNPJ = {$empresa}
                    WHERE codigo = '{$cod_antigo}'";
        return mysqli_query($conexao, $alter);
    }

    function remove_jogo($conexao, $ID){
        $delete = "DELETE FROM JOGO WHERE codigo = {$ID}";
        return mysqli_query($conexao, $delete);
    }

    function busca_auto_completa_jogo($conexao, $campo, $buscar){
        $busca = "SELECT {$campo} FROM JOGO J
                    JOIN EMPRESA E ON E.CNPJ = J.EMPRESA_CNPJ
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

    function busca_auto_completa_jogo_empresa($conexao, $campo, $buscar, $empresa){
        $busca = "SELECT {$campo} FROM JOGO J
                    JOIN EMPRESA E ON E.CNPJ = J.EMPRESA_CNPJ
                    WHERE {$campo} LIKE '%{$buscar}%'
                    AND J.EMPRESA_CNPJ = '{$empresa}'
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

    function busca_jogo($conexao, $campo, $buscar){
        $resultados = array();
        $busca = "SELECT J.*, E.nome
                    FROM JOGO J
                    JOIN EMPRESA E ON J.EMPRESA_CNPJ = E.CNPJ
                    WHERE {$campo} LIKE '%{$buscar}%'
                    ORDER BY {$campo}";
        $resultado = mysqli_query($conexao, $busca);
        while ($res = mysqli_fetch_assoc($resultado)) {
            array_push($resultados, $res);
        }
        return $resultados;
    }
