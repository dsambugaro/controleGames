function checaUsofuncionario(){
    var check = document.getElementById("no_funcionario");
    var forms = document.getElementsByClassName("pessoa");
    var selecionaFuncionario = document.getElementById("funcionario_selecionado");
    var selecionaPessoa = document.getElementById("pessoa_selecionada");
    if (check.checked) {
        for (var i=0;i<forms.length;i++){
            forms[i].setAttribute('readonly',true);
            forms[i].setAttribute('tabindex',-1);
            selecionaFuncionario.disabled = false;
            selecionaPessoa.disabled = true;

            for (i = 0; i < selecionaPessoa.options.length; i++)
            {
                if (selecionaPessoa.options[i].value == 0)
                {
                    selecionaPessoa.options[i].selected = "true";
                    break;
                }
            }

        }
    } else {
        for (var i=0;i<forms.length;i++){
            forms[i].removeAttribute('readonly');
            forms[i].removeAttribute('tabindex');
            selecionaFuncionario.disabled = true;
            selecionaPessoa.disabled = false;
            resetForm();


        }
    }
}

function getfuncionario(){
    var funcionario = document.getElementById("funcionario_selecionado");
    if (funcionario.value == "12345678912" ) {
        setfuncionario("123456");
    } else if (funcionario.value == "15975315975") {
        setfuncionario("123457");
    }
}

function setfuncionario(getCadastro){
    var cadastro = document.getElementById("cadastro");
    cadastro.value = getCadastro;
}




function resetForm(){

    var funcionario = document.getElementById("funcionario_selecionado");

    cadastro.value = "";

    for (i = 0; i < funcionario.options.length; i++)
    {
        if (funcionario.options[i].value == 0)
        {
            funcionario.options[i].selected = "true";
            break;
        }
    }

}
