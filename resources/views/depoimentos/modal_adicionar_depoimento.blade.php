<!-- Modal -->
<div class="modal fade" id="modalAdicionarDepoimento" tabindex="-1" role="dialog"
    aria-labelledby="modalAdicionarDepoimentoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAdicionarDepoimentoLabel">Adicionar Depoimento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulário para adicionar depoimento -->
                <form id="formDepoimento">
                    <div class="form-group">
                        <label for="nome">Remetente*</label>
                        <input type="text" id="nome" class="form-control" value="{{ auth()->user()->name }}"
                            disabled>
                    </div>
                    <div class="">
                        <label for="destinatario">Destinatario*</label><br>
                        <select style="width: 100%;" id="destinatario" class="form-control select2" required>
                            <option value="" disabled>Selecione um destinatario</option>

                            @foreach ($atendentes as $d)
                                <option value="{{ $d->id }}">{{ $d->nome }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="depoimento">Depoimento</label>
                        <textarea id="depoimento" class="form-control" rows="4" placeholder="Escreva seu depoimento..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary fecharModal" data-dismiss="modal"><i
                        class="bi bi-arrow-left"></i>Fechar</button>
                <button type="submit" form="formDepoimento" class="btn btn-primary" id="salvarDepoimento"> <i
                        class="bi bi-floppy"></i> Salvar</button>
            </div>
        </div>
    </div>
</div>
<script>
        select2('destinatarios');

    // Função para enviar o formulário de depoimento via AJAX
    $('#salvarDepoimento').on('click', function(event) {
        event.preventDefault(); // Prevenir o envio padrão do formulário
        // Obter os valores dos campos
        var nome = $('#nome').val(); // Nome do usuário (já preenchedo)
        var depoimento = $('#depoimento').val(); // Texto do depoimento
        var destinatario = $('#destinatario').val(); // Texto do depoimento

        // Verificar se o campo de depoimento não está vazio
        if (depoimento.trim() == '') {
            msgToastr('Por favor, escreva um depoimento.', 'warning');
            return;
        }

        // Enviar via AJAX para salvar o depoimento
        $.ajax({
            url: @json(route('depoimento.post')), // Substitua pela sua rota de armazenar depoimento
            method: 'POST',
            data: {
                nome: nome,
                destinatario: destinatario,
                depoimento: depoimento,
                _token: '{{ csrf_token() }}' // Inclui o token CSRF para segurança
            },
            success: function(response) {
                if (response.success == true) {
                    msgToastr(response.msg, 'success');

                    $('.fecharModal').click(); // Fechar o modal
                    $('#depoimento').val('');
                } else {
                    msgToastr(response.msg, 'warning');

                }
            },
            error: function(xhr, status, error) {

                msgToastr('Erro ao salvar depoimento. Tente novamente.', 'error');

                console.log(error);
            }
        });
    });
</script>
