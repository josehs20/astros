<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateUsuarioProcessosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('usuario_processos')->truncate();

        DB::table('usuario_processos')->insert(self::getUsuarioProcessos());

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private static function getUsuarioProcessos()
    {
        return [
            //----------------------------ADMIN---------------------------//
            [
                'processo_id' => config('conf.processos.gerenciamento.atendente.id'),
                'grupo_usuario_id' => config('conf.grupo_usuario.admin'),
            ],
            [
                'processo_id' => config('conf.processos.gerenciamento.promocao.id'),
                'grupo_usuario_id' => config('conf.grupo_usuario.admin'),
            ],
            [
                'processo_id' => config('conf.processos.historicos.chat.id'),
                'grupo_usuario_id' => config('conf.grupo_usuario.admin'),
            ],
            [
                'processo_id' => config('conf.processos.gerenciamento.cliente.id'),
                'grupo_usuario_id' => config('conf.grupo_usuario.admin'),
            ],
            [
                'processo_id' => config('conf.processos.menu.painel.id'),
                'grupo_usuario_id' => config('conf.grupo_usuario.admin'),
            ],
            [
                'processo_id' => config('conf.processos.menu.compras.id'),
                'grupo_usuario_id' => config('conf.grupo_usuario.admin'),
            ],
            [
                'processo_id' => config('conf.processos.menu.pontos.id'),
                'grupo_usuario_id' => config('conf.grupo_usuario.admin'),
            ],
            [
                'processo_id' => config('conf.processos.menu.suporte.id'),
                'grupo_usuario_id' => config('conf.grupo_usuario.admin'),
            ],
            [
                'processo_id' => config('conf.processos.menu.depoimento.id'),
                'grupo_usuario_id' => config('conf.grupo_usuario.admin'),
            ],
            [
                'processo_id' => config('conf.processos.financeiro.fechamento.id'),
                'grupo_usuario_id' => config('conf.grupo_usuario.admin'),
            ],
            [
                'processo_id' => config('conf.processos.financeiro.credito.id'),
                'grupo_usuario_id' => config('conf.grupo_usuario.admin'),
            ],
            [
                'processo_id' => config('conf.processos.conta.perfil.id'),
                'grupo_usuario_id' => config('conf.grupo_usuario.admin'),
            ]
            
            //----------------------------atendente---------------------------//

        ];
    }
}
