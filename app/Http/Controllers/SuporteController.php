<?php

namespace App\Http\Controllers;

use App\Models\Suporte;
use App\Models\SuporteResposta;
use App\System\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Fluent;

class SuporteController extends Controller
{
    public function index()
    {
        $suportes = Suporte::with('respostas_ativa')->orderBy('id', 'desc')->get();
       
        return view('suporte.index', ['suportes' => $suportes]);
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // Validar os dados recebidos
            $p = new Fluent(Post::anti_injection_array($request->all()));

            $suporte = Suporte::create([
                'usuario_id' => auth()->user()->id,
                'assunto' => $p->assunto,
                'mensagem' => $p->mensagem,
                'status_id' => config('conf.status.aberto'),
            ]);

            session()->flash('success', 'Chamado aberto com sucesso.');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function responder(Request $request)
    {
        DB::beginTransaction();
        try {
            $p = new Fluent(Post::anti_injection_array($request->all()));
            $suporte = Suporte::find($p->suporte_id);
            $suporte->update([
                'status_id' => config('conf.status.respondido')
            ]);

            $suporte->respostas()->create([
                'usuario_id' => auth()->user()->id,
                'mensagem' => $p->resposta
            ]);

            session()->flash('success', 'Resposta adcionada com sucesso.');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function remover_resposta(Request $request)
    {
        DB::beginTransaction();
        try {
            $p = new Fluent(Post::anti_injection_array($request->all()));
            $resposta = SuporteResposta::find($p->resposta_id);
            $suporte = $resposta->suporte;

            $resposta->update([
                'ativo' => false
            ]);

            if ($suporte->respostas_ativa->count() == 0) {
                $suporte->update([
                    'status_id' => config('conf.status.aberto')
                ]);
            }

            session()->flash('success', 'Resposta deletada com sucesso.');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
}
