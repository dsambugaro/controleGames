<?php
    $estados = lista_tabela_simples($conexao, ESTADO);
?>

<div class="row">
    <div class="form-group col-md-4">
        <label for="nome">Nome</label>
        <input type="text" class="form-control pessoa" id="nome" placeholder="Digite o nome" name="pessoa_nome" required>
    </div>
    <div class="form-group col-md-4">
        <label for="cpf">CPF</label>
        <input type="text" class="form-control pessoa" id="cpf" placeholder="CPF sem pontos ou traço" name="pessoa_cpf" maxlength="11" required>
    </div>
    <div class="form-group col-md-4">
        <label for="nascimento">Data de Nascimento</label>
        <input type="date" class="form-control pessoa" id="nascimento" name="pessoa_nascimento" required>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-2">
        <label for="logradouro">Logradouro</label>
        <select class="form-control pessoa" id="logradouro" name="pessoa_logradouro" tabindex="-1" required>
            <option value="">Escolha um tipo...</option>
            <option value="Rua">Rua</option>
            <option value="Avenida">Avenida</option>
            <option value="Praca">Praça</option>
            <option value="Travessa">Travessa</option>
            <option value="Estrada">Estrada</option>
            <option value="Outro">Outro</option>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="nome_end">Nome</label>
        <input type="text" class="form-control pessoa" id="nome_end" placeholder="Digite o nome da rua" name="end_nome" required>
    </div>
    <div class="form-group col-md-2">
        <label for="num">Número</label>
        <input type="text" class="form-control pessoa" id="num" placeholder="Número" name="end_num" required>
    </div>
    <div class="form-group col-md-4">
        <label for="bairro">Bairro</label>
        <input type="text" class="form-control pessoa" id="bairro" placeholder="Nome do Bairro" name="end_bairro" required>
    </div>
    <div class="form-group col-md-4">
        <label for="cep">CEP</label>
        <input type="text" class="form-control pessoa" id="cep" placeholder="Apenas Números" name="end_cep" required>
    </div>
    <div class="form-group col-md-4">
        <label for="estado">Estado</label>
        <select class="form-control pessoa" name="estado" id="estado" onchange="cidadeLimpa()" required>
            <option value="">Escolha um estado</option>
            <?php
                foreach ($estados as $estado):
                    $selecionado = ($endereco['estado_id'] == $estado['ID']) ? "selected":"";
            ?>
                    <option value="<?=$estado['ID']?>" <?=$selecionado?> ><?=$estado['nome']?></option>
            <?php
                endforeach;
            ?>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="cidade">Cidade</label>
        <input type="text" class="form-control pessoa" id="cidade" placeholder="Nome da Cidade" name="cidade" onchange="validaCidade()" readonly required>
        <input type="hidden" class="form-control pessoa" id="id_cidade" name="id_cidade" value="0">
        <input type="hidden" class="form-control pessoa" id="cidade_valida" name="cidade_valida" value="0">
    </div>
</div>
<script>
    $('#cpf').keyup(function () {
        this.value = this.value.replace(/[^0-9]/g,'');
    });
    $('#cep').keyup(function () {
        this.value = this.value.replace(/[^0-9]/g,'');
    });
    $('#num').keyup(function () {
        this.value = this.value.replace(/[^0-9]/g,'');
    });
    $("#cidade").keypress( function(event){
        $( "#cidade" ).autocomplete({
            source: '<?=$url_busca?>?campo=nome&key='+$("#estado").val()+'&table=CIDADE',
        });
    });
    $( "#cidade" ).on( "autocompleteselect", function( event, ui ) {
        var buscar = ui.item.value;
        $.ajax({
            method: "post",
            url: '<?=$url_busca?>?campo=nome&key='+$("#estado").val()+'&table=CIDADE',
            data: 'acao=1&filtro='+buscar,
            dataType: 'json',
            success: function(retorno){
                var resultado = document.getElementById("cidade");
                var id = document.getElementById("id_cidade");
                var valida = document.getElementById("cidade_valida");
                resultado.value = retorno[0].nome;
                id.value = retorno[0].ID;
                valida.value = retorno[0].nome;
            }
        });
    });
    function cidadeLimpa(){
        $("#id_cidade").val("0");
        $("#cidade").val("");
        $("#cidade_valida").val("0");
        var cidade = document.getElementById("cidade");
        if ($("#estado").val() == "") {
            cidade.setAttribute('readonly',true);
        } else {
            cidade.removeAttribute('readonly');
        }
    }
    function validaCidade(){
        if (!($("#cidade").val() == $("#cidade_valida").val())) {
            $("#cidade").val("");
            alert("Coloque uma cidade válida!");

        }
    }
    $(document).ready(function(){
        $("#nome").focus();
    });
</script>
