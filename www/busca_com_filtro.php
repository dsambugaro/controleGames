<script>
    $("#busca").keypress( function(event){
        $("#busca").autocomplete({
            source: '<?=$tableMin?>/busca_<?=$tableMin?>.php?campo='+$("input[name=campo]:checked").val()+'&table=<?=$table?>',
        });
    });
    $( "#busca" ).on( "autocompleteselect", function( event, ui ) {
        var buscar = ui.item.value;
        $.ajax({
            method: "post",
            url: '<?=$tableMin?>/busca_<?=$tableMin?>.php?campo='+$("input[name=campo]:checked").val()+'&table=<?=$table?>',
            data: 'acao=1&key=<?=$key?>&filtro='+buscar,
            dataType: 'html',
            success: function(retorno){
                var resultado = document.getElementById("itens");
                resultado.innerHTML = retorno;
            }
        });
    })
</script>
