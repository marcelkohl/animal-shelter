<?php
return [
    'settings' => [
        // comment this line when deploy to production environment
        'displayErrorDetails' => true,

        // View settings
        'view' => [
            'template_path' => __DIR__ . '/templates',
            'twig' => [
                'cache' => __DIR__ . '/../storage/cache/twig',
                'debug' => true,
                'auto_reload' => true,
            ],
        ],

        // DB settings
        'db' => [
            'database' => __DIR__ . '/../storage/db/test-db.sqlite'
        ],

        // monolog settings
        'logger' => [
            'name' => "app-name-here",
            'path' => __DIR__ . '/../storage/logs/app.log',
        ],
    ],
];
