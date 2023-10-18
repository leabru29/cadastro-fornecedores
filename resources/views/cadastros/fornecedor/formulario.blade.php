    <div class="row mt-3">
        <div class="col-6">
            <label for="nome" class="form-label">Nome Fantasia / Nome Completo</label>
            <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome"
                value="{{ old('nome') }}">
            @error('nome')
                <span class="text-danger">{{ $message }} *</span>
            @enderror

        </div>
        <div class="col-6">
            <label for="razao_social" class="form-label">Razão Social</label>
            <input type="text" class="form-control @error('razao_social') is-invalid @enderror" name="razao_social"
                id="razao_social" value="{{ old('razao_social') }}">
            @error('razao_social')
                <span class="text-danger">{{ $message }} *</span>
            @enderror
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-6">
            <label for="tipo_pessoa" class="form-label">Tipo de Pessoa</label>
            <select class="form-select @error('tipo_pessoa') is-invalid @enderror" name="tipo_pessoa" id="tipo_pessoa"
                value="{{ old('tipo_pessoa') }}">
                <option selected value="">Selecione um tipo de Pessoa</option>
                <option value="PF">Pessoa Física (PF)</option>
                <option value="PJ">Pessoa Jurídica (PJ)</option>
            </select>
            @error('tipo_pessoa')
                <span class="text-danger">{{ $message }} *</span>
            @enderror
        </div>
        <div class="col-6">
            <label for="dt_nasc" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="dt_nasc" name="dt_nasc" value="{{ old('dt_nasc') }}">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-6">
            <label for="rg" class="form-label">RG</label>
            <input type="text" class="form-control" id="rg" name="rg" value="{{ old('rg') }}">
        </div>
        <div class="col-6">
            <label for="insc_est" class="form-label">Inscrição Estadual</label>
            <input type="text" class="form-control" id="insc_est" name="insc_est" value="{{ old('insc_est') }}">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-6">
            <label for="nome_res" class="form-label">Nome do Responsável</label>
            <input type="text" class="form-control" id="nome_res" name="nome_res" value="{{ old('nome_res') }}">
        </div>
        <div class="col-6">
            <label for="tel_res" class="form-label">Telefone do Responsável</label>
            <input type="text" class="form-control" id="tel_res" name="tel_res" value="{{ old('tel_res') }}">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-6">
            <label for="logradouro" class="form-label">Endereço</label>
            <input type="text" class="form-control @error('logradouro') is-invalid @enderror" id="logradouro"
                name="logradouro" value="{{ old('logradouro') }}">
            @error('logradouro')
                <span class="text-danger">{{ $message }} *</span>
            @enderror
        </div>
        <div class="col-6">
            <label for="numero" class="form-label">Número</label>
            <input type="text" class="form-control @error('numero') is-invalid @enderror" id="numero"
                name="numero" value="{{ old('numero') }}">
            @error('numero')
                <span class="text-danger">{{ $message }} *</span>
            @enderror
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-6">
            <label for="complemento" class="form-label">Complemento</label>
            <input type="text" class="form-control" id="complemento" name="complemento"
                value="{{ old('complemento') }}">
        </div>
        <div class="col-6">
            <label for="bairro" class="form-label">Bairro</label>
            <input type="text" class="form-control @error('bairro') is-invalid @enderror" id="bairro"
                name="bairro" value="{{ old('bairro') }}">

            @error('bairro')
                <span class="text-danger">{{ $message }} *</span>
            @enderror
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-6">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" class="form-control @error('cidade') is-invalid @enderror" id="cidade"
                name="cidade" value="{{ old('cidade') }}">
            @error('cidade')
                <span class="text-danger">{{ $message }} *</span>
            @enderror
        </div>
        <div class="col-6">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" class="form-control @error('cep') is-invalid @enderror" id="cep"
                name="cep" value="{{ old('cep') }}">
            @error('cep')
                <span class="text-danger">{{ $message }} *</span>
            @enderror
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-6">
            <label for="tel_1" class="form-label">Telefone 1</label>
            <input type="text" class="form-control @error('tel_1') is-invalid @enderror" id="tel_1"
                name="tel_1" value="{{ old('tel_1') }}">
            @error('tel_1')
                <span class="text-danger">{{ $message }} *</span>
            @enderror
        </div>
        <div class="col-6">
            <label for="tel_2" class="form-label">Telefone 2</label>
            <input type="text" class="form-control" id="tel_2" name="tel_2" value="{{ old('tel_2') }}">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-6">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control @error('tel_1') is-invalid @enderror" id="email"
                name="email" value="{{ old('email') }}">
            @error('email')
                <span class="text-danger">{{ $message }} *</span>
            @enderror
        </div>
        <div class="col-6">
            <label for="site" class="form-label">Site</label>
            <input type="text" class="form-control" id="site" name="site" value="{{ old('site') }}">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-6">
            <label for="observacoes" class="form-label">Observação</label>
            <input type="text-area" class="form-control" id="observacoes" name="observacoes"
                value="{{ old('observacoes') }}">
        </div>
    </div>
