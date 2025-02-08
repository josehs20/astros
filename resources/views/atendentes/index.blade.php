@extends('layouts.base', ['trilhaHtml' =>
'    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Início</a></li>
            <li class="breadcrumb-item"><a href="'.route('atendente.index').'">Atendentes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Atualizar</li>
        </ol>
    </nav>' 
               ])

@section('content')
 
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Atendentes</h1>
    <p class="mb-4">Você pode visualizar criar, editar e excluir um atendente.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Lista de atendentes</h6>
                <a type="button" href="{{route('atendente.create')}}" class="btn btn-primary"><i class="bi bi-plus"></i>Adicionar</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableAtendente" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Preço</th>
                            <th>Nome fantasia</th>
                            <th>Telefone</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($atendentes as $a)
                            <tr>
                                <td>{{ $a->name }}</td>
                                <td>{{ $a->email }}</td>
                                <td>{{ converterParaReais($a->atendente->preco) }}</td>
                                <td>{{ $a->atendente->nome ?? '' }}</td>
                                <td>{{ $a->atendente->tel ?? '' }}</td>
                                <td><a href="{{route('atendente.edit', ['id' => $a->atendente->id])}}" class="btn btn-dark"><i class="bi bi-pencil-square"></i> Editar</a></td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        montaDatatable('dataTableAtendente');
    </script>
@endsection
