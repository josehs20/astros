<?php

namespace App\Http\Controllers;

use App\Models\Atendente;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index($ancorar = null)
    {
        $atendentes = Atendente::with('usuario')->whereHas('usuario', function($q){
            $q->where('ativo', true);
        })->get();

        return view('inicio.index', compact('ancorar', 'atendentes'));
    }

    public function show($atendente_id)
    {
        $atendente = Atendente::with('usuario')->find($atendente_id);
        return view('consultar.show', ['atendente' => $atendente]);
    }

}
