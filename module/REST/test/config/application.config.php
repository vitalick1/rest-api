<?php
return [
    'modules' => [
        'DoctrineModule',
        'DoctrineORMModule',
        'REST',
    ],
    'module_listener_options' => [
        'module_paths' => [],
        'config_glob_paths' => [
            __DIR__ . '/autoload/{{,*.}global,{,*.}local}.php',
        ],
    ],

];
