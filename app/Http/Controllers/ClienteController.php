<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use App\System\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Fluent;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = User::where('grupo_usuario_id', config('conf.grupo_usuario.cliente'))->get();
        return view('cliente.index', ['clientes' => $clientes]);
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

            $validator = Validator::make($request->all(), [
                'nome' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email|max:255',
                'password' => 'required|min:6|confirmed',
                'preco' => 'nullable|regex:/^\d+(\,\d{1,2})?$/',
                'ativo' => 'boolean',
                'descricao' => 'nullable|string|max:500',
                'data_nascimento' => 'required|date|before:today', // Validar data de nascimento
            ], [
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
                'data_nascimento.required' => 'A data de nascimento é obrigatória.',
                'data_nascimento.date' => 'A data de nascimento deve ser uma data válida.',
                'data_nascimento.before' => 'A data de nascimento não pode ser hoje ou no futuro.',
            ]);

            // Se a validação falhar
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first(), 1);
            }

            // Criar o usuário
            $usuario = User::create([
                "name" => $p->nome,
                "email" => $p->email,
                "password" => Hash::make($p->password),
                "ativo" => $request->ativo ?? false,
                'grupo_usuario_id' => config('conf.grupo_usuario.cliente')
            ]);

            // Criar o cliente associado ao usuário
            $cliente = $usuario->cliente()->create([
                'nome' => $p->nome,
                'data_nascimento' => $p->data_nascimento, // Agora pega a data de nascimento
                'tel' => $p->tel,
                'usuario_id' => $usuario->id, // Correção para referenciar o ID do usuário
                'tempo_usado' => 0,
                'tempo' => $p->tempo_restante, // Agora pega o tempo
                'tempo_total_usado' => 0,
                'total_gasto' => 0,
            ]);

            DB::commit();
            session()->flash('success', 'Cliente cadastrado com sucesso.');
            return redirect()->route('cliente.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            session()->flash('error', 'Erro ao cadastrar cliente.' . $e->getMessage());
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('cliente.edit', ['cliente' => $cliente]);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            // Validar os dados recebidos
            $p = new Fluent(Post::anti_injection_array($request->all()));
    
            // Obter o cliente pelo ID
            $cliente = Cliente::findOrFail($id);
            $usuario = $cliente->usuario; // Encontre o usuário associado ao cliente
    
            // Validação
            $validator = Validator::make($request->all(), [
                'nome' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $usuario->id . '|max:255', // Usar o ID do usuário
                'password' => 'nullable|min:6|confirmed', // Senha é opcional na atualização
                'preco' => 'nullable|regex:/^\d+(\,\d{1,2})?$/',
                'ativo' => 'boolean',
                'descricao' => 'nullable|string|max:500',
                'data_nascimento' => 'required|date|before:today', // Validar data de nascimento
            ], [
                'nome.required' => 'O campo Nome é obrigatório.',
                'nome.string' => 'O campo Nome deve ser um texto.',
                'nome.max' => 'O campo Nome não pode ter mais de 255 caracteres.',
                'email.required' => 'O campo E-mail é obrigatório.',
                'email.email' => 'Informe um endereço de e-mail válido.',
                'email.unique' => 'Este e-mail já está cadastrado.',
                'email.max' => 'O e-mail não pode ter mais de 255 caracteres.',
                'password.min' => 'A senha deve ter no mínimo 6 caracteres.',
                'password.confirmed' => 'A confirmação da senha não confere.',
                'data_nascimento.required' => 'A data de nascimento é obrigatória.',
                'data_nascimento.date' => 'A data de nascimento deve ser uma data válida.',
                'data_nascimento.before' => 'A data de nascimento não pode ser hoje ou no futuro.',
            ]);
        
            // Se a validação falhar
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first(), 1);
            }
    
            // Atualizar o usuário
            $usuario->name = $p->nome;
            $usuario->email = $p->email;
            
            // Atualizar a senha apenas se foi fornecida
            if ($request->filled('password')) {
                $usuario->password = Hash::make($p->password);
            }
    
            $usuario->ativo = $request->ativo ?? false;
            $usuario->save(); // Salva as alterações no usuário
    
            // Atualizar o cliente associado ao usuário
            $cliente->nome = $p->nome;
            $cliente->data_nascimento = $p->data_nascimento;
            $cliente->tel = $p->tel;
            $cliente->tempo_usado = 0; // Caso queira resetar o tempo, senão mantenha o valor existente
            $cliente->tempo = $p->tempo_restante * 60;
            $cliente->tempo_total_usado = 0; // Caso queira resetar o tempo total
            $cliente->total_gasto = 0; // Caso queira resetar o gasto, senão mantenha o valor existente
            $cliente->save(); // Salva as alterações no cliente
        
            DB::commit();
            session()->flash('success', 'Cliente atualizado com sucesso.');
            return redirect()->route('cliente.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            session()->flash('error', 'Erro ao atualizar cliente.' . $e->getMessage());
            return redirect()->back();
        }
    }
    
}
