<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUsuariosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('grupo_usuario_id', config('conf.grupo_usuario.admin'))->first();

        if (!$admin) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@astro.com',
                'password' => Hash::make('secret'),
                'grupo_usuario_id' => config('conf.grupo_usuario.admin'),
            ]);
        }
    }
}
