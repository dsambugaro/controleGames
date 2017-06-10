<?php
    $remove = array_key_exists('remove', $_GET) ? $_GET['remove']:-1;
    if($remove == 1):
?>
        <p class="alert-success text-center"><?=ucfirst($tableMin)?> removid<?=$tratamento?> com sucesso!</p>
<?php
    elseif($remove == 0):
        $msg_erro = $_GET['error'];
?>
        <p class="alert-danger text-center"><?=ucfirst($tableMin)?> não pode ser removid<?=$tratamento?>!<br><br>
            Erro: <?=$msg_erro?><br><br>
            Entre em contato com o Administrador do Sistema</p>
<?php endif; ?>

<?php
    $alter = array_key_exists('alter', $_GET) ? $_GET['alter']:-1;
    if($alter == 1):
?>
        <p class="alert-success text-center"><?=ucfirst($tableMin)?> editad<?=$tratamento?> com sucesso!</p>
<?php
    elseif($alter == 0):
        $msg_erro = $_GET['error'];
?>
        <p class="alert-danger text-center"><?=ucfirst($tableMin)?> não pode ser editad<?=$tratamento?>!<br><br>
            Erro: <?=$msg_erro?><br><br>
            Entre em contato com o Administrador do Sistema</p>
<?php
    endif;
?>

<?php
    $add = array_key_exists('add', $_GET) ? $_GET['add']:-1;
    if($add == 1):
?>
        <p class="alert-success text-center"><?=ucfirst($tableMin)?> adicionad<?=$tratamento?> com sucesso!</p>
<?php
    elseif($add == 0):
        $msg_erro = $_GET['error'];
?>
        <p class="alert-danger text-center"><?=ucfirst($tableMin)?> não pode ser adicionad<?=$tratamento?>!<br><br>
            Erro: <?=$msg_erro?><br><br>
            Entre em contato com o Administrador do Sistema</p>
<?php
    endif;
?>
