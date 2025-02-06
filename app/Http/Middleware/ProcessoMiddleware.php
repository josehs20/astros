<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $processo)
    {
        if (!session()->has('processoUsuario') || empty(session('processoUsuario'))) {
            session()->flash('error', 'Você não tem permissão para acessar essa área!');
            return redirect()->back();
        }        

        if ($processo && $processo != '' && in_array($processo, session('processoUsuario'))) {
            $request->attributes->set('processo_id', $processo);
            return $next($request);
        }

        session()->flash('error', 'Você não tem permissão para acessar essa área!');

        return redirect()->route('home.index');
    }
}
