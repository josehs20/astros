<?php

namespace App\Http\Controllers;

use App\Models\Promocao;
use App\System\Post;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Fluent;

class PromocaoController extends Controller
{
    public function index()
    {
        return view('promocoes.index');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $p = new Fluent(Post::anti_injection_array($request->all()));
         
            //upload foto
            $promocao = Promocao::create([
                'minuto' => inteiroParaTime($p->minutos),
                'pontos' => $p->pontos,
            ]);

            DB::commit();
            return response()->json(['success' => true, 'msg' => 'Promoção cadastrada com cuesso']);
        } catch (\Exception $e) {

            DB::rollBack();
            Log::error($e);
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function getPromocoesDataTable()
    {
        $promocoes = Promocao::get()->map(function ($item) {
            return [
                 $item->minuto,
                 $item->pontos,
                 '<a class="btn btn-danger" onclick="removePromocao(' . $item->id . ')">
                                <i class="bi bi-trash3-fill"></i> Excluir
                            </a>'
            ];
        });

        return response()->json(['data' => $promocoes]);
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            $p = new Fluent(Post::anti_injection_array($request->all()));

            Promocao::where('id', $p->id)->delete();
            
            DB::commit();
            return response()->json(['success' => true, 'msg' => 'Promoção deletada com sucesso.']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}
