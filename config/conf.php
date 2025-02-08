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
                'icon' => '<i class="bi bi-people"></i>',
                'rota' => 'atendente.index',
                'posicao_menu' => 1000,
            ],
            'promocao' => [
                'id' => 2,
                'nome' => 'Promoções',
                'descricao' => '',
                'icon' => '<i class="bi bi-gift-fill"></i>',
                'rota' => 'promocao.index',
                'posicao_menu' => 1000,
            ],
            'cliente' => [
                'id' => 7,
                'nome' => 'Clientes',
                'descricao' => '',
                'icon' => '<i class="bi bi-person-check-fill"></i>',
                'rota' => 'cliente.index',
                'posicao_menu' => 1000,
            ]
        ],

        'historicos' => [
            'nome' => 'Histórico de consulta',
            'chat' => [
                'id' => 3,
                'nome' => 'Chat',
                'descricao' => '',
                'icon' => '<i class="bi bi-chat-left-text-fill"></i>',
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
                'icon' => '<i class="bi bi-house-door-fill"></i>',
                'rota' => 'painel.index',
                'posicao_menu' => 1000,
            ],
            'consulta' => [
                'id' => 5,
                'nome' => 'Consultar',
                'descricao' => '',
                'icon' => '<i class="bi bi-chat-square-dots-fill"></i>',
                'rota' => 'consulta.index',
                'posicao_menu' => 1000,
            ],
            'compras' => [
                'id' => 6,
                'nome' => 'Compras',
                'descricao' => '',
                'rota' => 'compras.index',
                'icon' => '<i class="bi bi-basket3-fill"></i>',
                'posicao_menu' => 1000,
            ],
            'pontos' => [
                'id' => 8,
                'nome' => 'Pontos',
                'descricao' => '',
                'rota' => 'pontos.index',
                'icon' => '<i class="bi bi-basket3-fill"></i>',
                'posicao_menu' => 1000,
            ],
            'suporte' => [
                'id' => 9,
                'nome' => 'Suporte',
                'descricao' => '',
                'rota' => 'suporte.index',
                'icon' => '<i class="bi bi-chat-square-quote"></i>',
                'posicao_menu' => 1000,
            ],
            'depoimento' => [
                'id' => 10,
                'nome' => 'Depoimento',
                'descricao' => '',
                'rota' => 'depoimento.index',
                'icon' => '<i class="bi bi-card-checklist"></i>',
                'posicao_menu' => 1000,
            ],
        ],
        'financeiro' => [
            'nome' => 'Financeiro',
            'fechamento' => [
                'id' => 11,
                'nome' => 'Fechamento',
                'descricao' => '',
                'rota' => 'fechamento.index',
                'icon' => '<i class="bi bi-cash-coin"></i>',
                'posicao_menu' => 1000,
            ],
            'credito' => [
                'id' => 12,
                'nome' => 'Creditos',
                'descricao' => '',
                'rota' => 'credito.index',
                'icon' => '<i class="bi bi-cash-coin"></i>',
                'posicao_menu' => 1000,
            ]
        ],
        'conta' => [
            'nome' => 'Conta',
            'perfil' => [
                'id' => 13,
                'nome' => 'Perfil',
                'descricao' => '',
                'rota' => 'perfil.index',
                'icon' => '<i class="bi bi-person-bounding-box"></i>',
                'posicao_menu' => 1000,
            ]
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
