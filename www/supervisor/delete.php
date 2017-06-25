<?php
    include '../bd_control/conecta.php';
    include 'supervisor_control.php';

    $ID = $_POST['delete'];

    if (remove_supervisor($conexao, $ID)) {
        header("Location: ../supervisor.php?remove=1");
        die();
    } else {
        $msg = mysqli_error($conexao);
        header("Location: ../supervisor.php?remove=0&error={$msg}");
        die();
    }
