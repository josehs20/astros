@extends('layouts.base', [
    'trilhaHtml' => '    
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Início</a></li>
                <li class="breadcrumb-item active" aria-current="page">Suporte</li>
            </ol>
        </nav>',
])

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Suporte</h1>
    <p class="mb-4">Você pode visualizar os chamados no suporte e abrir um chamado para o mesmo.</p>

    <!-- Card de Suporte -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Lista de Chamados</h6>
            <div>

                <a type="button" data-toggle="modal" data-target="#modalChamarSuporte" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Suporte
                </a>
            </div>
        </div>

        <div class="card-body">
            @if ($suportes->isEmpty())
                <p class="text-muted text-center">Nenhum suporte ativo no momento.</p>
            @else
                <ul class="list-group">
                    @foreach ($suportes as $suporte)
                        <li class="list-group-item">
                            <div>
                                <strong>{{ $suporte->usuario->name }}</strong>
                                <span class="text-muted small">({{ $suporte->created_at->format('d/m/Y H:i') }})</span>
                                @if ($suporte->status_id == config('conf.status.aberto'))
                                <i class="bi bi-exclamation-triangle-fill text-warning" title="Chamado em aberto"></i>
                            @endif
                            </div>
                            <p class="mb-2">{{ $suporte->mensagem }}</p>

                            @if ($suporte->respostas_ativa->isNotEmpty())
                                <div class="ml-4">
                                    @foreach ($suporte->respostas_ativa as $resposta)
                                        <div class="border-left pl-3 mb-2">
                                            <small class="text-muted">{{ $resposta->usuario->name }} respondeu:</small>
                                            <p class="mb-1">{{ $resposta->mensagem }}</p>
                                            <span
                                                class="text-muted small">{{ $resposta->created_at->format('d/m/Y H:i') }}</span>
                                            
                                                @if (auth()->user()->grupo_usuario_id == config('conf.grupo_usuario.admin'))
                                                <div class="response-remover-form mt-2" id="response-remover-form-{{ $resposta->id }}">
                                                    <form action="{{ route('suporte.remover.resposta') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="resposta_id" value="{{$resposta->id}}">
                                                        <button type="submit" class="btn btn-danger btn-sm">Remover resposta</button>
                                                    </form>
                                                </div>
                                                @endif
                                            </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted small ml-4">Nenhuma resposta ainda.</p>
                            @endif

                            <!-- Botão para responder -->
                            <a href="#" class="btn btn-link btn-sm toggle-response" data-id="{{ $suporte->id }}">
                                Responder
                            </a>

                            <!-- Formulário escondido inicialmente -->
                            <div class="response-form mt-2" id="response-form-{{ $suporte->id }}" style="display: none;">
                                <form action="{{ route('suporte.responder') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="suporte_id" value="{{ $suporte->id }}">
                                    <div class="form-group">
                                        <textarea name="resposta" class="form-control" rows="2" placeholder="Escreva sua resposta..." required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    @include('suporte.modal_chamar_suporte')

    <script>
        $(document).ready(function() {
            $('.toggle-response').on('click', function(e) {
                e.preventDefault();

                let suporteId = $(this).data('id');
                let form = $('#response-form-' + suporteId);

                // Alternar visibilidade
                form.toggle();

                // Se desejar fechar os outros formulários abertos
                $('.response-form').not(form).hide();
            });
        });
    </script>

@endsection
