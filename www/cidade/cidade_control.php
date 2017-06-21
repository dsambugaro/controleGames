<?php
    $referencia = nome;
    $table = CIDADE;
    $key = ID;
    $tableMin = strtolower($table);
    $tratamento = a;

    function insert_cidade($conexao, $nome_cidade, $estado){
        $insert_cidade = "INSERT INTO CIDADE(`nome`,`ESTADO_ID`) VALUES ('{$nome_cidade}','{$estado}')";
        return mysqli_query($conexao, $insert_cidade);
    }

    function alter_cidade($conexao, $nome_cidade, $estado, $ID){
        $alter = "UPDATE CIDADE SET nome = '{$nome_cidade}', ESTADO_ID = '{$estado}'  WHERE ID = {$ID}";
        return mysqli_query($conexao, $alter);
    }

    function remove_cidade($conexao, $ID){
        $delete = "DELETE FROM CIDADE WHERE ID = {$ID}";
        return mysqli_query($conexao, $delete);
    }

    function lista_cidade($conexao, $ID){
        $rows = array();
        $select = "SELECT C.*, E.nome as estado FROM CIDADE C JOIN ESTADO E ON C.ESTADO_ID = E.ID";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }

    function selecionaTuplaCidade($conexao, $ID){
        $selectTupla = "SELECT C.*, E.nome as estado FROM CIDADE C JOIN ESTADO E ON C.ESTADO_ID = E.ID WHERE C.ID = {$ID}";
        $resultado = mysqli_query($conexao, $selectTupla);
        return mysqli_fetch_assoc($resultado);
    }

    function busca_auto_completa_estado($conexao, $table, $campo, $buscar){
        $busca = "SELECT E.nome as estado FROM CIDADE C JOIN ESTADO E ON C.ESTADO_ID = E.ID WHERE E.nome LIKE '%{$buscar}%' GROUP BY {$campo} ORDER BY {$campo}";
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

    function busca_por_cidade($conexao, $campo, $buscar){
        $resultados = array();
        $busca = "SELECT C.*, E.nome as estado FROM CIDADE C JOIN ESTADO E ON C.ESTADO_ID = E.ID WHERE C.{$campo} LIKE '%{$buscar}%' ORDER BY C.{$campo}";
        $resultado = mysqli_query($conexao, $busca);
        while ($retorno = mysqli_fetch_assoc($resultado)) {
            array_push($resultados, $retorno);
        }
        return $resultados;
    }

    function busca_por_estado($conexao, $campo, $buscar){
        $resultados = array();
        $busca = "SELECT C.*, E.nome as estado FROM CIDADE C JOIN ESTADO E ON C.ESTADO_ID = E.ID WHERE E.nome LIKE '%{$buscar}%' ORDER BY E.nome";
        $resultado = mysqli_query($conexao, $busca);
        while ($retorno = mysqli_fetch_assoc($resultado)) {
            array_push($resultados, $retorno);
        }
        return $resultados;
    }

?>
