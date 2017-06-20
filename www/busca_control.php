<script>
    $( "#busca" ).autocomplete({
        source: 'busca.php?campo=<?=$campo_pesquisa?>&table=<?=$table?>',
    });
    $( "#busca" ).on( "autocompleteselect", function( event, ui ) {
        var buscar = ui.item.value;
        $.ajax({
            method: "post",
            url: 'busca.php?campo=<?=$campo_pesquisa?>&table=<?=$table?>',
            data: 'acao=1&key=<?=$key?>&filtro='+buscar,
            dataType: 'html',
            success: function(retorno){
                var resultado = document.getElementById("itens");
                resultado.innerHTML = retorno;
            }
        });
    })
</script>
