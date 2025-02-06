<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CreateAcoesSeed::class);
        $this->call(CreateProcessosSeed::class);
        $this->call(CreateGrupoUsuarioSeed::class);
        $this->call(CreateUsuarioProcessosSeed::class);
        $this->call(CreateUsuariosSeed::class);
    }
}
