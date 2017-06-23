<?php
    function lista_supervisores($conexao){
        $rows = array();
        $select = "SELECT S.*, P.nome_pessoa as nome
                    FROM SUPERVISOR S
                    JOIN PESSOA P ON S.FUNCIONARIO_PESSOA_CPF = P.CPF";
        $resultado = mysqli_query($conexao, $select);
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($rows, $row);
        }
        return $rows;
    }
