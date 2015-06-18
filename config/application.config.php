<?php
/**
 * Configuration file generated by ZFTool
 * The previous configuration file is stored in application.config.old
 *
 * @see https://github.com/zendframework/ZFTool
 */
return [
    'modules' => [
        'Application',
        'REST',
        'DoctrineModule',
        'DoctrineORMModule'
    ],
    'module_listener_options' => [
        'module_paths' => [
            './vendor',
        ],
        'config_glob_paths' => [
            'config/autoload/{{,*.}global,{,*.}local}.php',
        ],
    ],

];
