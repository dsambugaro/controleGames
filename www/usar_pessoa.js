
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

function getPessoa(){
    var pessoa = document.getElementById("pessoa_selecionada");
    if (pessoa.value == "12345678912" ) {
        setPessoa("Darlan Felipe", "12345678912", "1997-09-11", "rua", "Pinus", "98", "Centro", "Jundiaí","sp", "87268000");
    } else if (pessoa.value == "15975315975") {
        setPessoa("Felipe Jonas", "15975315975", "2000-09-22", "avenida", "29 de Novembro", "1345", "Centro", "Araruna","pr", "29878258");
    } else {
        setPessoa("Humberto Pereira", "23645789875", "1980-10-05", "avenida", "Irmãos Pereira", "987", "Centro", "Campo Mousão","pr", "31594897");
    }
}

function setPessoa(getNome, getCpf, getNasc, getTipoLogradouro, getNomeEnd, getNum, getBairro, getCidade,getUf, getCep){
    var nome = document.getElementById("nome");
    var cpf = document.getElementById("cpf");
    var nasc = document.getElementById("nascimento");
    var logradouro = document.getElementById("logradouro");
    var nome_end = document.getElementById("nome_end");
    var num = document.getElementById("num");
    var bairro = document.getElementById("bairro");
    var cidade = document.getElementById("cidade");
    var estado = document.getElementById("estado");
    var cep = document.getElementById("cep");

    var uf = getUf;
    var tipo_logradouro = getTipoLogradouro;

    nome.value = getNome;
    cpf.value = getCpf;
    nasc.value = getNasc;
    nome_end.value = getNomeEnd;
    num.value = getNum;
    bairro.value = getBairro;
    cidade.value = getCidade;
    cep.value = getCep;

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
    var cidade = document.getElementById("cidade");
    var estado = document.getElementById("estado");
    var cep = document.getElementById("cep");
    var pessoa = document.getElementById("pessoa_selecionada");

    nome.value = "";
    cpf.value = "";
    nasc.value = "";
    nome_end.value = "";
    num.value = "";
    bairro.value = "";
    cidade.value = "";
    cep.value = "";

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

    for (i = 0; i < pessoa.options.length; i++)
    {
        if (pessoa.options[i].value == 0)
        {
            pessoa.options[i].selected = "true";
            break;
        }
    }

}
