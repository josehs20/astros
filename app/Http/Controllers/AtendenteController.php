<?php

namespace App\Http\Controllers;

use App\Models\Atendente;
use App\Models\User;
use App\System\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Fluent;

class AtendenteController extends Controller
{
    public function index()
    {
        $atendentes = User::where('grupo_usuario_id', config('conf.grupo_usuario.atendente'))->get();
        return view('atendentes.index', ['atendentes' => $atendentes]);
    }

    public function create()
    {
        $atendentes = User::where('grupo_usuario_id', config('conf.grupo_usuario.atendente'))->get();
        return view('atendentes.create', ['atendentes' => $atendentes]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $p = new Fluent(Post::anti_injection_array($request->except('foto')));
            $validator = Validator::make($request->all(), [
                'nome' => 'required|string|max:255',
                'nome_fantasia' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email|max:255',
                'password' => 'required|min:6|confirmed',
                'preco' => 'nullable|regex:/^\d+(\,\d{1,2})?$/',
                'ativo' => 'boolean',
                'descricao' => 'nullable|string|max:500',
            ], [
                'nome_fantasia.required' => 'O campo Nome fantasia é obrigatório.',
                'nome.required' => 'O campo Nome é obrigatório.',
                'nome.string' => 'O campo Nome deve ser um texto.',
                'nome.max' => 'O campo Nome não pode ter mais de 255 caracteres.',

                'email.required' => 'O campo E-mail é obrigatório.',
                'email.email' => 'Informe um endereço de e-mail válido.',
                'email.unique' => 'Este e-mail já está cadastrado.',
                'email.max' => 'O e-mail não pode ter mais de 255 caracteres.',

                'password.required' => 'O campo Senha é obrigatório.',
                'password.min' => 'A senha deve ter no mínimo 6 caracteres.',
                'password.confirmed' => 'A confirmação da senha não confere.',

                'preco.regex' => 'O preço deve estar no formato correto (ex: 10,50).',
            ]);

            // Se a validação falhar
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first(), 1);
            }

            //upload foto
            $usuario = User::create([
                "name" => $p->nome,
                "email" => $p->email,
                "password" => Hash::make($p->password),
                "ativo" => $request->ativo ?? false,
                'grupo_usuario_id' => config('conf.grupo_usuario.atendente')
            ])->atendente()->create([
                'nome' => $p->nome_fantasia,
                'preco' => converteDinheiroParaFloat($p->preco),
                'comissao' => converteDinheiroParaFloat($request->comissao),
                'foto' => '',
                'descricao' => $p->descricao,
                'tel' => $request->tel,
            ])->uploadFoto($request);

            session()->flash('success', 'Atendente cadastrado com sucesso.');
            DB::commit();
            return redirect()->route('atendente.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            session()->flash('error', 'Erro ao cadastrar atendente.' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $atendente = Atendente::find($id);
        return view('atendentes.edit', ['atendente' => $atendente]);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            // Encontrar o atendente pelo ID
            $atendente = Atendente::findOrFail($id);
            $usuario = $atendente->usuario; // Acessando o usuário associado ao atendente

            // Validar os dados recebidos
            $validator = Validator::make($request->all(), [
                'nome' => 'required|string|max:255',
                'nome_fantasia' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $usuario->id,
                'preco' => 'nullable|regex:/^\d+(\,\d{1,2})?$/',
                'ativo' => 'boolean',
                'descricao' => 'nullable|string|max:500',
            ], [
                'nome_fantasia.required' => 'O campo Nome fantasia é obrigatório.',
                'nome.required' => 'O campo Nome é obrigatório.',
                'nome.string' => 'O campo Nome deve ser um texto.',
                'nome.max' => 'O campo Nome não pode ter mais de 255 caracteres.',

                'email.required' => 'O campo E-mail é obrigatório.',
                'email.email' => 'Informe um endereço de e-mail válido.',
                'email.unique' => 'Este e-mail já está cadastrado.',
                'email.max' => 'O e-mail não pode ter mais de 255 caracteres.',

                'preco.regex' => 'O preço deve estar no formato correto (ex: 10,50).',
            ]);

            // Se a validação falhar
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first(), 1);
            }

            // Atualizar o usuário
            $usuario->update([
                "name" => $request->nome,
                "email" => $request->email,
                "ativo" => $request->ativo ?? false,
                "password" => $request->has('password') ? Hash::make($request->password) : $usuario->password
            ]);

            // Atualizar o atendente
            $atendente->update([
                'nome' => $request->nome_fantasia,
                'preco' => converteDinheiroParaFloat($request->preco),
                'comissao' => converteDinheiroParaFloat($request->comissao),
                'descricao' => $request->descricao,
                'tel' => $request->tel,
            ]);
     
            // Se houver foto, fazer o upload
            if ($request->hasFile('foto')) {
                $atendente->uploadFoto($request);
            }

            session()->flash('success', 'Atendente atualizado com sucesso.');
            DB::commit();
            return redirect()->route('atendente.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            session()->flash('error', 'Erro ao atualizar atendente.' . $e->getMessage());
            return redirect()->back();
        }
    }
}
