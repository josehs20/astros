<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()) {
            $this->carregaMenus();
        }else {
            session()->forget(['processoUsuario', 'menu']);
            return redirect()->route('login.sair');
        }

        return view('home');
    }

    private function carregaMenus()
    {
        $processosUsuario = auth()->user()->processos;

        $menu = [];
        foreach ($processosUsuario as $key => $p) {
            $menu['processoUsuario'][] = $p['id'];
            $menu['menu'][$p->processo->tipo][] = $p;
        }

        $ordem = [
            'Menu'
        ];
        $menu['menu'] = $this->ordenarArrayPorChaves($menu['menu'], $ordem);
      
        session(['processoUsuario' => $menu['processoUsuario']]);
        session(['menu' => $menu['menu']]);
    }

    function ordenarArrayPorChaves(array $array, array $ordemDesejada): array {
        $arrayOrdenado = [];
    
        // Primeiro, adicionamos as chaves na ordem desejada, se existirem no array original
        foreach ($ordemDesejada as $chave) {
            if (array_key_exists($chave, $array)) {
                $arrayOrdenado[$chave] = $array[$chave];
            }
        }
    
        // Depois, adicionamos o restante das chaves que não estavam na ordem desejada
        foreach ($array as $chave => $valor) {
            if (!array_key_exists($chave, $arrayOrdenado)) {
                $arrayOrdenado[$chave] = $valor;
            }
        }
    
        return $arrayOrdenado;
    }
    
}
