<?php
    function insert_metodo($conexao, $nome_metodo){
        $insert = "INSERT INTO METODO(`nome`) VALUES ('{$nome_metodo}')";
        return mysqli_query($conexao, $insert);
    }

    function alter_metodo($conexao, $nome_metodo, $ID){
        $alter = "UPDATE METODO SET nome = '{$nome_metodo}' WHERE ID = {$ID}";
        return mysqli_query($conexao, $alter);
    }

    function remove_metodo($conexao, $ID){
        $delete = "DELETE FROM METODO WHERE ID = {$ID}";
        return mysqli_query($conexao, $delete);
    }
