<?php

    $campo_pesquisa = user;
    $referencia = user;
    $table = USUARIO;
    $key = ID;
    $tableMin = strtolower($table);
    $tratamento = o;

    function insert_usuario($conexao, $nome_usuario, $senha_usuario){
        $insert_usuario = "INSERT INTO USUARIO(`user`,`senha`) VALUES ('{$nome_usuario}','{$senha_usuario}')";
        return mysqli_query($conexao, $insert_usuario);
    }

    function alter_usuario($conexao, $nome_usuario, $senha_usuario, $ID){
        $alter = "UPDATE USUARIO SET user = '{$nome_usuario}', senha = '{$senha_usuario}'  WHERE ID = {$ID}";
        return mysqli_query($conexao, $alter);
    }

    function remove_usuario($conexao, $ID){
        $delete = "DELETE FROM USUARIO WHERE ID = {$ID}";
        return mysqli_query($conexao, $delete);
    }

?>
