<td>
    <ul class="list-inline">
        <li>
            <form action="<?=$tableMin?>/<?=$tableMin?>_view.php" method="post">
                <input type="hidden" name="view" value="<?=$row["{$key}"]?>">
                <button class="btn btn-primary btn-xs">Visualizar</button>
            </form>
        </li>
        <li>
            <form action="<?=$tableMin?>/<?=$tableMin?>_edit.php" method="post">
                <input type="hidden" name="edit" value="<?=$row["{$key}"]?>">
                <button class="btn btn-warning btn-xs">Editar</button>
            </form>
        </li>
        <li>
            <form action="<?=$tableMin?>/delete.php" method="post">
                <input type="hidden" name="delete" value="<?=$row["{$key}"]?>">
                <button class="btn btn-danger btn-xs" value="Deletar">Deletar</button>
            </form>
        </li>
    </ul>
</td>
