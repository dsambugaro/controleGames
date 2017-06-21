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
