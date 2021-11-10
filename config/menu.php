<?php

return [
    'dashboard' => [
        'icon' => 'home',
        'route_name' => 'dashboard',
        'title' => 'Dashboard',
        'params' => [],
        'permissions' => [
            'dashboard.dashboard.index' => 'Geral'
        ]
    ],
    'menu-management' => [
        'icon' => 'cog',
        'title' => 'Gerenciamento',
        'group_name' => 'management',
        'sub_menu' => [
            'client' => [
                'icon' => 'angel',
                'route_name' => 'management.client',
                'title' => 'Clientes',
                'params' => [],
                'permissions' => [
                    'management.client.index' => 'Item Cadastrados',
                    'management.client.create' => 'Novo',
                    'management.client.edit' => 'Editar',
                    'management.client.delete' => 'Deletar'
                ],
            ],

        ],
    ],
    'menu-security' => [
        'icon' => 'key',
        'title' => 'Segurança',
        'group_name' => 'security',
        'sub_menu' => [
            'users' => [
                'icon' => 'user',
                'route_name' => 'security.users',
                'title' => 'Usuários',
                'params' => [],
                'permissions' => [
                    'security.users.index' => 'Item Cadastrados',
                    'security.users.create' => 'Novo',
                    'security.users.edit' => 'Editar',
                    'security.users.delete' => 'Deletar'
                ],
            ],

        ],
    ],
    /*'menu-registrations' => [
        'icon' => 'plus',
        'title' => 'Cadastros',
        'group_name' => 'registrations',
        'sub_menu' => [
            'departaments' => [
                //'icon' => 'home',
                'route_name' => 'registrations.departaments',
                'title' => 'Departamentos',
                'params' => [],
                'permissions' => []
            ],
        ]
    ]*/
];
