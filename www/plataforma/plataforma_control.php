<?php

    function insert_plataforma($conexao, $nome_plataforma){
        $insert_plataforma = "INSERT INTO PLATAFORMA(`nome`) VALUES ('{$nome_plataforma}')";
        return mysqli_query($conexao, $insert_plataforma);
    }

    function alter_plataforma($conexao, $nome_plataforma, $ID){
        $alter = "UPDATE PLATAFORMA SET nome = '{$nome_plataforma}' WHERE ID = {$ID}";
        return mysqli_query($conexao, $alter);
    }

    function remove_plataforma($conexao, $ID){
        $delete = "DELETE FROM PLATAFORMA WHERE ID = {$ID}";
        return mysqli_query($conexao, $delete);
    }

?>
