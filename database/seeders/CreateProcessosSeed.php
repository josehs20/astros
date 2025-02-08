<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateProcessosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('processos')->truncate();

        DB::table('processos')->insert(self::getProcessos());

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private static function getProcessos()
    {
        $processos = config('conf.processos');
        $data = [];
        foreach ($processos as $tipo => $value) {
            $n = $value['nome'];
            unset($value['nome']);
            foreach ($value as $tipo => $v) {
            $data[] = [
                'id' => $v['id'],
                'descricao' => $v['descricao'],
                'nome' => $v['nome'],
                'tipo' => $n,
                'icon' => $v['icon'],
                'rota' => $v['rota'],
                'posicao_menu' => $v['posicao_menu']
            ];
            }
        }
       
        return $data;
    }
}
