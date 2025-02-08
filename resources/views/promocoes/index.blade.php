@extends('layouts.base', [
    'trilhaHtml' => '    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Início</a></li>
            <li class="breadcrumb-item"><a >Promoções</a></li>
        </ol>
    </nav>',
])

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Promoções</h1>
    <p class="mb-4">Você pode visualizar, criar e excluir uma promoção.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Lista de promoções</h6>
                <!-- Trigger Button -->

                <a type="button" data-toggle="modal" data-target="#promoModal" class="btn btn-primary"><i
                        class="bi bi-plus"></i>Adicionar Promoção</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTablePromocao" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tempo</th>
                            <th>Pontos</th>
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
    <div class="modal fade" id="promoModal" tabindex="-1" role="dialog" aria-labelledby="promoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="promoModalLabel">Cadastro de Promoção</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="promoForm">
                        <div class="form-group">
                            <label for="minutos">Minutos</label>
                            <input type="number" class="form-control" id="minutos" name="minutos"
                                placeholder="Insira os minutos" required>
                        </div>
                        <div class="form-group">
                            <label for="pontos">Pontos</label>
                            <input type="number" class="form-control" id="pontos" name="pontos"
                                placeholder="Insira os pontos" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="fecharModal" data-dismiss="modal">Cancelar</button>
                    <button type="submit" form="promoForm" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var rotaAddPromocao = @json(route('promocao.store'));
        var rotaRemovePromocao = @json(route('promocao.delete'));
        var rotaGetPromocoes = @json(route('promocao.get'));
        $(document).ready(function() {
        montaDatatable('dataTablePromocao', rotaGetPromocoes);
    });

        function removePromocao(id) {
            $.ajax({
                url: rotaRemovePromocao, // Substitua pela sua URL de destino
                method: 'POST',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}' // Certifique-se de incluir o token CSRF se necessário
                },
                success: function(response) {
                    // Sucesso na requisição
                    if (response.success == true) {                        
                        msgToastr(response.msg, 'success');
                        montaDatatable('dataTablePromocao', rotaGetPromocoes);

                    } else {
                        msgToastr(response.msg, 'info');
                    }

                },
                error: function(xhr, status, error) {
                    // Erro na requisição
                    msgToastr('Erro ao deletar promoção. Tente novamente.', 'error');
                    console.log(error);
                }
            });
        }
        // Ao clicar em Salvar
        $('#promoForm').submit(function(event) {
            event.preventDefault(); // Prevenir o envio padrão do formulário

            var minutos = $('#minutos').val();
            var pontos = $('#pontos').val();

            // Enviar os dados via AJAX para uma rota
            $.ajax({
                url: rotaAddPromocao, // Substitua pela sua URL de destino
                method: 'POST',
                data: {
                    minutos: minutos,
                    pontos: pontos,
                    _token: '{{ csrf_token() }}' // Certifique-se de incluir o token CSRF se necessário
                },
                success: function(response) {
                    // Sucesso na requisição                    
                    if (response.success == true) {
                        $('#fecharModal').click();
                         $('#minutos').val('');
                         $('#pontos').val('');
                        msgToastr(response.msg, 'success');
                        montaDatatable('dataTablePromocao', rotaGetPromocoes);

                    } else {
                        msgToastr(response.msg, 'info');
                    }

                },
                error: function(xhr, status, error) {
                    // Erro na requisição
                    msgToastr('Erro ao cadastrar promoção. Tente novamente.', 'ierror');
                    console.log(error);
                }
            });
        });
    </script>
@endsection
