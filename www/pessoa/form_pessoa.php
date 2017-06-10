<div class="row">
    <div class="form-group col-md-4">
        <label for="nome">Nome</label>
        <input type="text" class="form-control pessoa" id="nome" placeholder="Digite o nome" name="pessoa_nome">
    </div>
    <div class="form-group col-md-4">
        <label for="cpf">CPF</label>
        <input type="text" class="form-control pessoa" id="cpf" placeholder="CPF sem pontos ou traço" name="pessoa_cpf">
    </div>
    <div class="form-group col-md-4">
        <label for="nascimento">Data de Nascimento</label>
        <input type="date" class="form-control pessoa" id="nascimento" name="pessoa_nascimento">
    </div>
</div>
<div class="row">
    <div class="form-group col-md-2">
        <label for="logradouro">Logradouro</label>
        <select class="form-control pessoa" id="logradouro" name="pessoa_logradouro" tabindex="-1">
            <option value="0">Escolha um tipo...</option>
            <option value="rua">Rua</option>
            <option value="avenida">Avenida</option>
            <option value="praca">Praça</option>
            <option value="travessa">Travessa</option>
            <option value="estrada">Estrada</option>
            <option value="outro">Outro</option>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="nome_end">Nome</label>
        <input type="text" class="form-control pessoa" id="nome_end" placeholder="Digite o nome da rua" name="end_nome">
    </div>
    <div class="form-group col-md-2">
        <label for="num">Número</label>
        <input type="number" class="form-control pessoa" id="num" placeholder="Número" name="end_num">
    </div>
    <div class="form-group col-md-4">
        <label for="bairro">Bairro</label>
        <input type="text" class="form-control pessoa" id="bairro" placeholder="Nome do Bairro" name="end_bairro">
    </div>
    <div class="form-group col-md-4">
        <label for="cidade">Cidade</label>
        <input type="text" class="form-control pessoa" id="cidade" placeholder="Nome da Cidade" name="end_cidade">
    </div>
    <div class="form-group col-md-4">
        <label for="cep">CEP</label>
        <input type="number" class="form-control pessoa" id="cep" placeholder="CEP" name="end_cep">
    </div>
    <div class="form-group col-md-2">
        <label for="estado">Estado</label>
        <select class="form-control pessoa" id="estado" name="end_estado" tabindex="-1">
            <option value="0">Escolha um</option>
            <option value="ac">AC</option>
            <option value="al">AL</option>
            <option value="ap">AP</option>
            <option value="am">AM</option>
            <option value="ba">BA</option>
            <option value="ce">CE</option>
            <option value="df">DF</option>
            <option value="es">ES</option>
            <option value="go">GO</option>
            <option value="ma">MA</option>
            <option value="mt">MT</option>
            <option value="ms">MS</option>
            <option value="mg">MG</option>
            <option value="pa">PA</option>
            <option value="pb">PB</option>
            <option value="pr">PR</option>
            <option value="pe">PE</option>
            <option value="pi">PI</option>
            <option value="rj">RJ</option>
            <option value="en">RN</option>
            <option value="rs">RS</option>
            <option value="ro">RO</option>
            <option value="rr">RR</option>
            <option value="sc">SC</option>
            <option value="sp">SP</option>
            <option value="se">SE</option>
            <option value="to">TO</option>
        </select>
    </div>
</div>
