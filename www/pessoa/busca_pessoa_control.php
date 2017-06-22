<?php
    function busca_dinamica_cidade($conexao, $table, $campo, $buscar, $campo_id, $id){
        $resultados = array();
        $busca = "SELECT * FROM {$table} WHERE {$campo} LIKE '%{$buscar}%' AND {$campo_id} = {$id} ORDER BY {$campo}";
        $resultado = mysqli_query($conexao, $busca);
        while ($retorno = mysqli_fetch_assoc($resultado)) {
            array_push($resultados, $retorno);
        }
        return $resultados;
    }

    function busca_auto_completa_cidade($conexao, $table, $campo, $buscar, $campo_id, $id){
        $busca = "SELECT {$campo} FROM {$table} WHERE {$campo} LIKE '%{$buscar}%' AND {$campo_id} = {$id} GROUP BY {$campo} ORDER BY {$campo}";
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
