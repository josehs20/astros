<div class="row">
    <div class="col-md-4 mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome"
            value="{{ old('nome', $cliente->nome ?? '') }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email"
            value="{{ old('email', $cliente->usuario->email ?? '') }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <label for="tel" class="form-label">Telefone</label>
        <input type="text" class="form-control" id="tel" name="tel"
            value="{{ old('tel', $cliente->tel ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento"
            value="{{ old('data_nascimento', \Carbon\Carbon::parse($cliente->data_nascimento)->format('Y-m-d') ?? '') }}" required>
    </div>
    

    <div class="col-md-4 mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <div class="col-md-4 mb-3">
        <label for="password_confirmation" class="form-label">Confirmar senha</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>

    <div class="col-md-4 mb-3">
        <label for="tempo_total_usado" class="form-label">Tempo restante (Em minutos)</label>
        <input type="text" class="form-control" id="tempo_restante" name="tempo_restante"
            value="{{ old('tempo', tempoParaMinutos($cliente->tempo->format('H:i:s')) ?? '') }}">
    </div>
    <div class="col-md-1 mx-1 mb-3">
        <label for="ativo" class="form-label d-block">Ativo</label>
        <input type="checkbox" class="form-check-input" id="ativo" name="ativo" 
            value="1" {{ old('ativo', $cliente->usuario->ativo ?? false) ? 'checked' : '' }} 
            style="width: 25px; height: 25px;">
    </div>
    <div class="d-flex justify-content-start">

        <a href="{{ url()->previous() }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
        <button type="submit" class="btn btn-primary mx-3">
            <i class="bi bi-floppy"></i> Salvar
        </button>

    </div>
</div>

<script>
    formataTempo('tempo_restante');
    maskTel('tel');
</script>
