<?php

    function lista_tabela_simples($conexao, $tabela){
        $plataformas = array();
        $select = "SELECT * FROM {$tabela}";
        $resultado = mysqli_query($conexao, $select);
        while ($plataforma = mysqli_fetch_assoc($resultado)) {
            array_push($plataformas, $plataforma);
        }
        return $plataformas;
    }

    function seleciona_tupla_simples($conexao, $tabela,$ID){
        $select = "SELECT * FROM {$tabela} WHERE ID = {$ID}";
        $resultado = mysqli_query($conexao, $select);
        return mysqli_fetch_assoc($resultado);
    }
