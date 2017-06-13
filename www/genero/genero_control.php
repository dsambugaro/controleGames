<?php

    $campo_pesquisa = nome;
    $referencia = nome;
    $table = GENERO;
    $key = ID;
    $tableMin = strtolower($table);
    $tratamento = o;

    function insert_genero($conexao, $nome_genero){
        $insert_genero = "INSERT INTO GENERO(`nome`) VALUES ('{$nome_genero}')";
        return mysqli_query($conexao, $insert_genero);
    }

    function alter_genero($conexao, $nome_genero, $ID){
        $alter = "UPDATE GENERO SET nome = '{$nome_genero}' WHERE ID = {$ID}";
        return mysqli_query($conexao, $alter);
    }

    function remove_genero($conexao, $ID){
        $delete = "DELETE FROM GENERO WHERE ID = {$ID}";
        return mysqli_query($conexao, $delete);
    }

?>
