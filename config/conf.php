<?php

use Illuminate\Support\Str;

return [

    'grupo_usuario' => [
        'admin' => 1,
        'atendente' => 2,
        'cliente' => 3
    ],

    'status' => [
        'livre' => 1,
        'ocupado' => 2,
        'off' => 3,
    ],

    'processos' => [

        'gerenciamento' => [
            'nome' => 'Gerenciamento',
            'atendente' => [
                'id' => 1,
                'nome' => 'Atendentes',
                'descricao' => '',
                'rota' => 'atendente.index',
                'posicao_menu' => 1000,
            ],
            'promocao' => [
                'id' => 2,
                'nome' => 'Promoções',
                'descricao' => '',
                'rota' => 'promocao.index',
                'posicao_menu' => 1000,
            ]
        ],

        'historicos' => [
            'nome' => 'Histórico de consulta',
            'chat' => [
                'id' => 3,
                'nome' => 'Chat',
                'descricao' => '',
                'rota' => 'chat.index',
                'posicao_menu' => 1000,
            ],
        ],

        'menu' => [
            'nome' => 'Menu',
            'painel' => [
                'id' => 4,
                'nome' => 'Meu Painel',
                'descricao' => '',
                'rota' => 'menu.painel.index',
                'posicao_menu' => 1000,
            ],

            'consulta' => [
                'id' => 4,
                'nome' => 'Consultar',
                'descricao' => '',
                'rota' => 'menu.consulta.index',
                'posicao_menu' => 1000,
            ],

            'compras' => [
                'id' => 5,
                'nome' => 'Compras',
                'descricao' => '',
                'rota' => 'menu.compras.index',
                'posicao_menu' => 1000,
            ],
        ],
    ],

    'acoes' => [
        'criou_atendente' => [
            'id' => 1,
            'descricao' => 'Criou atendente'
        ],
        
        'atualizou_atendente' => [
            'id' => 2,
            'descricao' => 'Atualizou atendente'
        ],

        'criou_promocao' => [
            'id' => 3,
            'descricao' => 'Criou promoção'
        ],

        'atualizou_promocao' => [
            'id' => 4,
            'descricao' => 'Atualizou promoção'
        ],
    ],
];
