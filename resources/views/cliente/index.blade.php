@extends('layouts.base', ['trilhaHtml' =>
'    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Início</a></li>
            <li class="breadcrumb-item"><a href="'.route('cliente.index').'">Atendentes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Atualizar</li>
        </ol>
    </nav>' 
               ])

@section('content')
 
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Clientes</h1>
    <p class="mb-4">Você pode visualizar criar, editar e excluir um cliente.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Lista de clientes</h6>
                <a type="button" href="{{route('cliente.create')}}" class="btn btn-primary"><i class="bi bi-plus"></i>Adicionar</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableCliente" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>tempo já usado</th>
                            <th>Tempo restante</th>
                            <th>total pago</th>
                            <th>Telefone</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($clientes as $c)
                       
                            <tr>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->email }}</td>
                                <td>{{ $c->cliente->tempo_total_usado->format('H:i:s') }}</td>
                                <td>{{$c->cliente->tempo->format('H:i:s') }}</td>
                                <td>{{ $c->cliente->total_gasto ? converterParaReais($c->cliente->total_gasto) :  '0,00' }}</td>
                                <td>{{ $c->cliente->tel ?? '' }}</td>
                                <td><a href="{{route('cliente.edit', ['id' => $c->cliente->id])}}" class="btn btn-dark"><i class="bi bi-pencil-square"></i> Editar</a></td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        montaDatatable('dataTableCliente');
    </script>
@endsection
