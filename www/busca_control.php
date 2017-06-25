<script>
    $( "#busca" ).autocomplete({
        source: 'busca.php?campo=<?=$campo_pesquisa?>&table=<?=$table?>',
        select: function(event, ui){
            var buscar = ui.item.value;
            retorna_busca(buscar);
        },
        change: function(busca){
            retorna_busca( $(this).val() );
        }
    });

    function retorna_busca(buscar){
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
    }
</script>
