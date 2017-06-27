<script>
    $("#pessoa_selecionada").keypress( function(event){
        $( "#pessoa_selecionada" ).autocomplete({
            source: '../busca.php?campo='+$("input[name=campo]:checked").val()+'&table=PESSOA',
        });
    });
    $( "#pessoa_selecionada" ).on( "autocompleteselect", function( event, ui ) {
        var buscar = ui.item.value;
        $.ajax({
            method: "post",
            url: '../pessoa/busca_pessoa_complete.php',
            data: 'campo='+$("input[name=campo]:checked").val()+'&filtro='+buscar,
            dataType: 'json',
            success: function(retorno){
                console.log(retorno[0]);
                var selecionado = ($("input[name=campo]:checked").val() == 'CPF') ? retorno[0].CPF:retorno[0].nome_pessoa;
                $("#pessoa_selecionada").val(selecionado);
                $("#cpf").val(retorno[0].CPF);
                $("#nome").val(retorno[0].nome_pessoa);
                $("#nascimento").val(retorno[0].data_nasc_pessoa);
                $("#logradouro").val(retorno[0].logradouro);
                $("#nome_end").val(retorno[0].nome);
                $("#num").val(retorno[0].numero);
                $("#bairro").val(retorno[0].bairro);
                $("#cep").val(retorno[0].CEP);
                $("#estado").val(retorno[0].estado_id);
                $("#cidade").val(retorno[0].cidade);
                $("#cidade_valida").val(retorno[0].cidade);
                $("#id_cidade").val(retorno[0].CIDADE_ID);
            }
        });
    });
</script>
