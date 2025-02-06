<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateGrupoUsuarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('grupo_usuarios')->truncate();

        DB::table('grupo_usuarios')->insert(self::getGrupoUsuario());

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private static function getGrupoUsuario()
    {
        $data = [];
        foreach (config('conf.grupo_usuario') as $key => $value) {

            $data[] = [
                'id' => $value,
                'descricao' => $key
            ];
        }
        return $data;
    }
}
