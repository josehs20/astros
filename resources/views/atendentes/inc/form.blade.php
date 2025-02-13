<div class="row">

    <div class="col-md-4 mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome"
            value="{{ old('nome', $atendente->usuario->name ?? '') }}" required>
    </div>
    <div class="col-md-4 mb-3">
        <label for="nome" class="form-label">E-mail</label>
        <input type="text" class="form-control" id="email" name="email"
            value="{{ old('nome', $atendente->usuario->email ?? '') }}" required>
    </div>
    <div class="col-md-4 mb-3">
        <label for="nome" class="form-label">Nome fantasia</label>
        <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia"
            value="{{ old('nome', $atendente->nome ?? '') }}" required>
    </div>
    <div class="col-md-4 mb-3">
        <label for="nome" class="form-label">Telefone</label>
        <input type="text" class="form-control" id="tel" name="tel"
            value="{{ old('nome', $atendente->tel ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label for="nome" class="form-label">Senha</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <div class="col-md-4 mb-3">
        <label for="nome" class="form-label">Confirmar senha</label>* caso confirme a senha sera substituida
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>



    <div class="col-md-6 mb-3 d-flex align-items-center">
        <div>
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*"
                onchange="previewImage(event)" {{ isset($atendente) && $atendente->foto ? '' : 'required' }}>
        </div>
        <div class="ms-3">
            <img id="preview"
                src="{{ isset($atendente) && $atendente->foto ? asset($atendente->foto) : '' }}"
                alt="Pré-visualização da Foto" class="img-thumbnail"
                style="width: 100px; height: 100px; object-fit: cover;">
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="preco" class="form-label">Especialidade</label>
        <input type="text" class="form-control" id="especialidade" name="especialidade" step="0.01"
           required value="{{ old('preco', isset($atendente) && $atendente->especialidade ? $atendente->especialidade :'') }}">
    </div>
    <div class="col-md-2 mb-3">
        <label for="preco" class="form-label">Preço (Por minuto)</label>
        <input type="text" class="form-control" id="preco" name="preco" step="0.01"
           required value="{{ old('preco', isset($atendente) && $atendente->preco ? converterParaReaisSemcifrao($atendente->preco) :'') }}">
    </div>

    <div class="col-md-2 mb-3">
        <label for="preco" class="form-label">Comissão:(%)</label>
        <input type="text" class="form-control" id="comissao" name="comissao" step="0.01"
           required value="{{ old('comissao', isset($atendente) && $atendente->comissao ? converterParaReaisSemcifrao($atendente->comissao) :'') }}">
    </div>
        
    <div class="col-md-6 mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="2">{{ old('descricao', $atendente->descricao ?? '') }}</textarea>
    </div>
    <div class="col-md-1 mx-1 mb-3">
        <label for="ativo" class="form-label d-block">Ativo</label>
        <input type="checkbox" class="form-check-input" id="ativo" name="ativo" 
            value="1" {{ old('ativo', $atendente->usuario->ativo ?? false) ? 'checked' : '' }} 
            style="width: 25px; height: 25px;">
    </div>
</div>
<div class="d-flex justify-content-start">
        
    <a href="{{  route('atendente.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Voltar
    </a>
    <button type="submit" class="btn btn-primary mx-3">
        <i class="bi bi-floppy"></i> Salvar
    </button>

</div>
<script>
    maskDinheiro('preco');
    maskDinheiro('comissao');
    maskTel('tel');

    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();

        reader.onload = function() {
            const img = document.getElementById('preview');
            img.src = reader.result;
        }

        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
