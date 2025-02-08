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
    <p class="mb-4">Você pode editar um atendente.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Atualizar atendente</h6>
           
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('atendente.update', ['id' => $atendente->id]) }}" method="post"enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('atendentes.inc.form')
            </form>
        </div>
    </div>

    <script>
    </script>
@endsection
