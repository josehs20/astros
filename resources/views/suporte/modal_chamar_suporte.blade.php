<!-- Modal -->
<div class="modal fade" id="modalChamarSuporte" tabindex="-1" role="dialog" aria-labelledby="modalChamarSuporteLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalChamarSuporteLabel">Chamar suporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('suporte.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <!-- Formulário para adicionar suporte -->

                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control" value="{{ auth()->user()->name }}"
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="nome">Assunto</label>
                        <input type="text" id="assunto" name="assunto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="mensagem">Mensagem</label>
                        <textarea required id="mensagem" name="mensagem" class="form-control" rows="4" placeholder="Escreva sobre o assunto..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fecharModal" data-dismiss="modal"><i class="bi bi-arrow-left"></i>Fechar</button>
                    <button type="submit" class="btn btn-primary"> <i class="bi bi-floppy"></i> Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
