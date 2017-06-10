<?php
include '../bd_control/conecta.php';
include 'metodo_control.php';
$nome_metodo = $_POST['metodo_nome'];
$ID = $_POST['metodo_id'];

if (alter_metodo($conexao, $nome_metodo, $ID)) {
    header("Location: ../metodo.php?alter=1");
    die();
} else {
    $msg = mysqli_error($conexao);
    header("Location: ../metodo.php?alter=0&error={$msg}");
    die();
}
