<div class="modal fade" id="delete-confirm" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir este item: <strong id="item-deletar"></strong>?
            </div>
            <div class="modal-footer">
                <form action="<?=$tableMin?>/delete.php" method="post">
                    <input type="hidden" name="delete" id="id-deletar">
                    <button class="btn btn-primary" value="Sim">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmaDelete(referencia, id){
        $('#delete-confirm').modal({show: true});
        $('#item-deletar').text(referencia);
        $('#id-deletar').val(id);
    }
</script>
