
function checaUsoPessoa(){
    var check = document.getElementById("no_pessoa");
    var forms = document.getElementsByClassName("pessoa");
    var seleciona = document.getElementById("pessoa_selecionada");
    if (check.checked) {
        for (var i=0;i<forms.length;i++){
            forms[i].setAttribute('readonly',true);
            forms[i].setAttribute('tabindex',-1);
            seleciona.disabled = false;
        }
    } else {
        for (var i=0;i<forms.length;i++){
            forms[i].removeAttribute('readonly');
            forms[i].removeAttribute('tabindex');
            seleciona.disabled = true;
            resetForm();
        }
    }
}

function resetForm(){
    $("#pessoa_selecionada").val("");
    $("#cpf").val("");
    $("#nome").val("");
    $("#nascimento").val("");
    $("#logradouro").val("");
    $("#nome_end").val("");
    $("#num").val("");
    $("#bairro").val("");
    $("#cep").val("");
    $("#estado").val("");
    $("#cidade").val("");
    $("#cidade_valida").val("");
    $("#id_cidade").val("");
}
