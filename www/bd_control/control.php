<?php

    function lista_tabela_simples($conexao, $tabela){
        $rows = array();
        $select = "SELECT * FROM {$tabela}";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }

    function seleciona_tupla_simples($conexao, $tabela, $ID){
        $select = "SELECT * FROM {$tabela} WHERE ID = {$ID}";
        $resultado = mysqli_query($conexao, $select);
        return mysqli_fetch_assoc($resultado);
    }

    function busca_auto_completa($conexao, $table, $campo, $buscar){
        $busca = "SELECT {$campo} FROM {$table} WHERE {$campo} LIKE '%{$buscar}%' GROUP BY {$campo} ORDER BY {$campo}";
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

    function busca_dinamica($conexao, $table, $campo, $buscar){
        $resultados = array();
        $busca = "SELECT * FROM {$table} WHERE {$campo} LIKE '%{$buscar}%' ORDER BY {$campo}";
        $resultado = mysqli_query($conexao, $busca);
        while ($retorno = mysqli_fetch_assoc($resultado)) {
            array_push($resultados, $retorno);
        }
        return $resultados;
    }
