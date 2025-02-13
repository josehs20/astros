<?php

namespace App\Http\Controllers;

use App\Models\Atendente;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {  
        return redirect()->route('inicio.index', ['ancorar' => 'consultores']);
    }
}
