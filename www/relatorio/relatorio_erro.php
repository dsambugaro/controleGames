<?php
    $msg = mysqli_error($conexao);
?>
    <p class="alert-danger text-center">
    Falha ao gerar relatório!
    <br><br>
    Erro: <?=$msg?>
    <br><br>
    Em caso de dúvidas: entre em contato com o Administrador do Sistema</p>
