<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateStatusSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('status')->truncate();

        DB::table('status')->insert(self::getStatus());

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private static function getstatus()
    {
        return array_map(function ($descricao, $id) {
            return [
                'id' => $id,
                'descricao' => $descricao
            ];
        }, array_keys(config('conf.status')), config('conf.status'));
        
    }
}
