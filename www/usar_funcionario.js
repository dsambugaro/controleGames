function checaUsofuncionario(){
    var check = document.getElementById("no_funcionario");
    var forms = document.getElementsByName("funcionario");
    var seleciona = document.getElementById("funcionario_selecionada");
    if (check.checked) {
        for (var i=0;i<forms.length;i++){
            forms[i].disabled = true;
            seleciona.disabled = false;
        }
    } else {
        for (var i=0;i<forms.length;i++){
            forms[i].disabled = false;
            seleciona.disabled = true;
            resetForm();


        }
    }
}

function getfuncionario(){
    var funcionario = document.getElementById("funcionario_selecionada");
    if (funcionario.value == "12345678912" ) {
        setfuncionario("Darlan Felipe", "12345678912", "1996-05-19", "rua", "Pinus", "98", "Centro", "pr", "87268000", "123456789");
    } else if (funcionario.value == "15975315975") {
        setfuncionario("Felipe Jonas", "15975315975", "2000-09-22", "avenida", "29 de Novembro", "1345", "Centro", "sp", "29878258", "123456788");
    }
}

function setfuncionario(getNome, getCpf, getNasc, getTipoLogradouro, getNomeEnd, getNum, getBairro, getUf, getCep, getCadastro){
    var nome = document.getElementById("nome");
    var cpf = document.getElementById("cpf");
    var nasc = document.getElementById("nascimento");
    var logradouro = document.getElementById("logradouro");
    var nome_end = document.getElementById("nome_end");
    var num = document.getElementById("num");
    var bairro = document.getElementById("bairro");
    var estado = document.getElementById("estado");
    var cep = document.getElementById("cep");
    var cadastro = document.getElementById("cadastro");

    var uf = getUf;
    var tipo_logradouro = getTipoLogradouro;

    nome.value = getNome;
    cpf.value = getCpf;
    nasc.value = getNasc;
    nome_end.value = getNomeEnd;
    num.value = getNum;
    bairro.value = getBairro;
    cep.value = getCep;
    cadastro.value = getCadastro;

    for (var i = 0; i < logradouro.options.length; i++)
    {
        if (logradouro.options[i].value == tipo_logradouro)
        {
            logradouro.options[i].selected = "true";
            break;
        }
    }

    for (var i = 0; i < estado.options.length; i++)
    {
        if (estado.options[i].value == uf)
        {
            estado.options[i].selected = "true";
            break;
        }
    }

}




function resetForm(){
    var nome = document.getElementById("nome");
    var cpf = document.getElementById("cpf");
    var nasc = document.getElementById("nascimento");
    var logradouro = document.getElementById("logradouro");
    var nome_end = document.getElementById("nome_end");
    var num = document.getElementById("num");
    var bairro = document.getElementById("bairro");
    var estado = document.getElementById("estado");
    var cep = document.getElementById("cep");
    var funcionario = document.getElementById("funcionario_selecionada");

    nome.value = "";
    cpf.value = "";
    nasc.value = "";
    nome_end.value = "";
    num.value = "";
    bairro.value = "";
    cep.value = "";
    cadastro.value = "";

    for (var i = 0; i < logradouro.options.length; i++)
    {
        if (logradouro.options[i].value == 0)
        {
            logradouro.options[i].selected = "true";
            break;
        }
    }

    for (i = 0; i < estado.options.length; i++)
    {
        if (estado.options[i].value == 0)
        {
            estado.options[i].selected = "true";
            break;
        }
    }

    for (i = 0; i < funcionario.options.length; i++)
    {
        if (funcionario.options[i].value == 0)
        {
            funcionario.options[i].selected = "true";
            break;
        }
    }

}
