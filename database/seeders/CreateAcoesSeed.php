<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateAcoesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('acoes')->truncate();

        DB::table('acoes')->insert(self::getAcoes());

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private static function getAcoes()
    {
        return config('conf.acoes');
    }
}
