<?php

namespace Database\Seeders\baseFake;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class CreateAtendentesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criação do objeto Faker
        $faker = Faker::create();

        // Criando 4 usuários fake
        for ($i = 1; $i <= 4; $i++) {
            // Gerando dados fake para o usuário
            $usuario = User::create([
                "name" => $faker->name,
                "email" => $faker->unique()->safeEmail,
                "password" => Hash::make('secret'), // Senha fake
                "ativo" => true,
                'grupo_usuario_id' => config('conf.grupo_usuario.atendente')
            ]);

            // Criando atendente para cada usuário
            $atendente = $usuario->atendente()->create([
                'nome' => $faker->company,
                'preco' => $faker->randomFloat(2, 50, 500), // Preço fake entre 50 e 500
                'comissao' => $faker->randomFloat(2, 5, 50), // Comissão fake entre 5% e 50%
                'foto' => 'public/assets/img/atendente' . $i . '.jpg', // Caminho da foto
                'descricao' => $faker->text(200), // Descrição fake
                'tel' => $faker->phoneNumber, // Telefone fake
                'especialidade' => $faker->text(20), // Telefone fake
            ]);
        }
    }
}
