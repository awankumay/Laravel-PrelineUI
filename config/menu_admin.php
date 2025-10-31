<?php

return [
    'menu' => [
        [
            'text' => 'Dashboard',
            'url' => '#',
            'icon' => 'heroicon-o-home',
            'type' => 'link',
        ],
        [
            'text' => 'Users',
            'icon' => 'heroicon-o-users',
            'type' => 'accordion',
            'submenu' => [
                [
                    'text' => 'Sub Menu 1',
                    'type' => 'accordion',
                    'submenu' => [
                        ['text' => 'Link 1', 'url' => '#', 'type' => 'link'],
                        ['text' => 'Link 2', 'url' => '#', 'type' => 'link'],
                        ['text' => 'Link 3', 'url' => '#', 'type' => 'link'],
                    ],
                ],
                [
                    'text' => 'Sub Menu 2',
                    'type' => 'accordion',
                    'submenu' => [
                        ['text' => 'Link A', 'url' => '#', 'type' => 'link'],
                        ['text' => 'Link B', 'url' => '#', 'type' => 'link'],
                    ],
                ],
            ],
        ],
        [
            'text' => 'Account',
            'icon' => 'heroicon-o-user-circle',
            'type' => 'accordion',
            'submenu' => [
                ['text' => 'Profile', 'url' => '#', 'type' => 'link'],
                ['text' => 'Settings', 'url' => '#', 'type' => 'link'],
                ['text' => 'Billing', 'url' => '#', 'type' => 'link'],
            ],
        ],
        [
            'text' => 'Projects',
            'icon' => 'heroicon-o-folder',
            'type' => 'accordion',
            'submenu' => [
                ['text' => 'All Projects', 'url' => '#', 'type' => 'link'],
                ['text' => 'Active', 'url' => '#', 'type' => 'link'],
                ['text' => 'Archived', 'url' => '#', 'type' => 'link'],
            ],
        ],
        [
            'text' => 'Calendar',
            'url' => '#',
            'icon' => 'heroicon-o-calendar',
            'type' => 'link',
            'badge' => 'New',
        ],
        [
            'text' => 'Documentation',
            'url' => '#',
            'icon' => 'heroicon-o-book-open',
            'type' => 'link',
        ],
    ],
];
