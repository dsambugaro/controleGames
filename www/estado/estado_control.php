<?php

    function insert_estado($conexao, $nome_estado){
        $insert_estado = "INSERT INTO ESTADO(`nome`) VALUES ('{$nome_estado}')";
        return mysqli_query($conexao, $insert_estado);
    }

    function alter_estado($conexao, $nome_estado, $ID){
        $alter = "UPDATE ESTADO SET nome = '{$nome_estado}' WHERE ID = {$ID}";
        return mysqli_query($conexao, $alter);
    }

    function remove_estado($conexao, $ID){
        $delete = "DELETE FROM ESTADO WHERE ID = {$ID}";
        return mysqli_query($conexao, $delete);
    }

?>
