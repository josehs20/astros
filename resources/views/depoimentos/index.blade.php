@extends('layouts.base', [
    'trilhaHtml' => '    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Início</a></li>
            <li class="breadcrumb-item"><a >Depoimentos</a></li>
        </ol>
    </nav>',
])

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Depoimentos</h1>
    <p class="mb-4">Você pode visualizar e aprovar um depoimento.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Lista de depoimentos</h6>
                <a type="button" data-toggle="modal" data-target="#novoDepoimentoModal" class="btn btn-primary">
                    Depoimentos
                    <span id="promoCount"
                        class="badge bg-light text-dark ms-2">{{ $depoimentos->where('ativo', false)->count() }}</span>
                    <!-- Badge do contador -->
                </a>

                <a type="button" data-toggle="modal" data-target="#modalAdicionarDepoimento" class="btn btn-primary"><i
                        class="bi bi-plus"></i>Adicionar depoimento</a>
                @include('depoimentos.modal_adicionar_depoimento')
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableDepoimento" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Depoimento</th>
                            <th>Criado em</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="novoDepoimentoModal" tabindex="-1" role="dialog"
        aria-labelledby="novoDepoimentoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="novoDepoimentoModalLabel">Lista de novos depoimentos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Lista de depoimentos -->
                    <ul id="listaDepoimentos" class="list-group">
                        <!-- Os depoimentos serão inseridos aqui -->
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fecharModal" data-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="ativarDepoimento()" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var rotaGetDepoiemntosPendente = @json(route('depoimento.get'));
        var rotaUpdateDepoimento = @json(route('depoimento.update'));
        // Função para preencher a lista de depoimentos
        montaDatatable('dataTableDepoimento', rotaGetDepoiemntosPendente, {
            ativo: true,
            table: true
        })

        function desativaDepoimento(id) {
            let selecionados = [];
            selecionados.push(id);

            $.ajax({
                url: rotaUpdateDepoimento, // Defina a rota no seu backend
                method: 'POST',
                data: {
                    depoimentos: selecionados,
                    ativo: false,
                    _token: '{{ csrf_token() }}' // Inclui o token CSRF para segurança
                },
                success: function(response) {
                    if (response.success == true) {
                        msgToastr(response.msg, 'success');
                        // $('.fecharModal').click();
                        montaDatatable('dataTableDepoimento', rotaGetDepoiemntosPendente, {
                            ativo: true,
                            table: true
                        })

                    } else {
                        msgToastr(response.msg, 'error');
                    }
                },
                error: function(xhr, status, error) {
                    msgToastr('Erro ao desativar depoimentos. Tente novamente.', 'error');
                    console.log(error);
                }
            });
        }

        function ativarDepoimento() {
            let selecionados = [];

            // Percorre todos os checkboxes marcados
            $('.depoimento-checkbox:checked').each(function() {
                selecionados.push($(this).data('id')); // Obtém o ID do depoimento a partir do atributo data-id
            });

            if (selecionados.length === 0) {
                msgToastr('Nenhum depoimento selecionado.', 'info');
                return;
            }

            $.ajax({
                url: rotaUpdateDepoimento, // Defina a rota no seu backend
                method: 'POST',
                data: {
                    depoimentos: selecionados,
                    ativo: true,
                    _token: '{{ csrf_token() }}' // Inclui o token CSRF para segurança
                },
                success: function(response) {
                    if (response.success == true) {
                        msgToastr(response.msg, 'success');
                        $('.fecharModal').click();
                        montaDatatable('dataTableDepoimento', rotaGetDepoiemntosPendente, {
                            ativo: true,
                            table: true
                        })

                    } else {
                        msgToastr(response.msg, 'error');
                    }
                },
                error: function(xhr, status, error) {
                    msgToastr('Erro ao ativar depoimentos. Tente novamente.', 'error');
                    console.log(error);
                }
            });
        }

        function preencherDepoimentos() {
            $.ajax({
                url: rotaGetDepoiemntosPendente, // Substitua pela sua URL de destino
                method: 'GET',
                success: function(response) {
                    console.log(response);

                    const lista = $('#listaDepoimentos'); // Seleciona a lista de depoimentos no modal
                    lista.empty(); // Limpa a lista existente

                    response.forEach(function(depoimento) {
                        // Formatar a data (supondo que 'created_at' está no formato 'Y-m-d H:i:s')
                        let dataCriacao = new Date(depoimento.created_at).toLocaleDateString('pt-BR', {
                            day: '2-digit',
                            month: '2-digit',
                            year: 'numeric'
                        });

                        // Cria um item de lista para cada depoimento
                        const item = `
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>${depoimento.usuario.name}</strong> <small>(${dataCriacao})</small><br>
                        ${depoimento.depoimento}
                    </div>
                    <input type="checkbox" class="depoimento-checkbox" data-id="${depoimento.id}">
                </li>
                `;
                        lista.append(item); // Adiciona o item à lista
                    });
                },
                error: function(xhr, status, error) {
                    // Erro na requisição
                    msgToastr('Erro ao deletar promoção. Tente novamente.', 'error');
                    console.log(error);
                }
            });

        }

        // Preenche os depoimentos ao abrir o modal
        $('#novoDepoimentoModal').on('show.bs.modal', function() {
            preencherDepoimentos();
            $('#listaDepoimentos').on('click', 'li', function(event) {
                // Verifica se o clique foi diretamente no checkbox (para evitar conflito)
                if (!$(event.target).is('input[type="checkbox"]')) {
                    // Encontra o checkbox dentro do elemento clicado
                    let checkbox = $(this).find('.depoimento-checkbox');

                    // Alterna o estado do checkbox
                    checkbox.prop('checked', !checkbox.prop('checked'));
                }
            });
        });
    </script>
@endsection
