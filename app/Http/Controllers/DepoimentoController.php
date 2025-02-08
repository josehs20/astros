<?php

namespace App\Http\Controllers;

use App\Models\Depoimento;
use App\System\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Fluent;

class DepoimentoController extends Controller
{
    public function index()
    {
        $depoimentos = Depoimento::get();
        return view('depoimentos.index', ['depoimentos' => $depoimentos]);
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

            $depoimento = Depoimento::create([
                'usuario_id' => auth()->user()->id,
                'depoimento' => $p->depoimento,
                'ativo' => false
            ]);
            DB::commit();
            return response()->json(['success' => true, 'msg' => 'Depoimento cadastrado com sucesso.']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return response()->json(['success' => false, 'msg' => 'Não foi possível cadastrar o depoimento.']);
        }
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            // Validar os dados recebidos
            $p = new Fluent(Post::anti_injection_array($request->all()));
            $ativo =  filter_var($request->ativo, FILTER_VALIDATE_BOOLEAN);
            $depoimentoIDs = $p->depoimentos;
            $depoimentos = Depoimento::whereIn('id', $depoimentoIDs)->update(['ativo' => $ativo]); 
            
            DB::commit();
            return response()->json(['success' => true, 'msg' => 'Depoimento '.( $ativo == true ? 'ativado com sucesso.' : 'desativado com sucesso.')]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return response()->json(['success' => false, 'msg' => 'Não foi possível alterar o depoimento.']);
        }
    }

    public function getDepoimentos(Request $request)
    {
        $ativo = $request->ativo ? true : false;
        $datatable = $request->table ? true : false;

        $depoimentos = Depoimento::with('usuario')->where('ativo', $ativo)->get();

        if ($datatable == true) {
            return response()->json(['data' => $depoimentos->map(function ($item) {
                return [
                    $item->usuario->name,
                    $item->depoimento,
                    $item->created_at->format('d-m-Y'),
                    '<a class="btn btn-danger" onclick="desativaDepoimento(' . $item->id . ')">
                    <i class="bi bi-trash3-fill"></i> Desativar
                </a>'
                ];
            })]);
        } else {
            return $depoimentos;
        }
    }
}
