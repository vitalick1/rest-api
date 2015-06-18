<?php
return [
    'router' => [
        'routes' => [
            'user' => [
                'type'    => 'segment',
                'options' => [
                    'route'    => '/rest/user[/:id]',
                    'constraints' => [
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'REST\Controller\User',
                    ],
                ],
            ],
            'home' => [ // <-- this array key is the route name
                'type' => 'Literal',
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => 'REST\Controller\Index',
                        'action' => 'index'
                    ],
                ],
            ],
        ],
    ],

    'controllers' => [
        'invokables' => [
            'REST\Controller\Index' => 'REST\Controller\IndexController'
        ],
        'factories' => [
            'REST\Controller\User' => 'REST\Controller\Factory\UserControllerFactory'
        ]
    ],

    'service_manager' => [
        'invokables' => [
            'hydrator' => 'Zend\Stdlib\Hydrator\ClassMethods'
        ],
        'factories' => [
            'userEntity' => 'REST\Entity\Factory\UserFactory',
            'userService' => 'REST\Service\Factory\UserFactory',
        ]
    ],

    'view_manager' => [

        'not_found_template'   => 'error/404',
        'exception_template'   => 'error/index',
        'template_map' => [
            'layout/layout'  => __DIR__ . '/../view/layout/layout.phtml',
            'error/404'      => __DIR__ . '/../view/error/404.phtml',
            'error/index'    => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => [
            'ViewJsonStrategy'
        ],
    ],


    'doctrine' => [
        'driver' => [
            // defines an annotation driver with two paths, and names it `my_annotation_driver`
            'rest_entity' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../src/REST/Entity',
                ],
            ],
            // default metadata driver, aggregates all other drivers into a single one.
            // Override `orm_default` only if you know what you're doing
            'orm_default' => [
                'drivers' => [
                    // register `my_annotation_driver` for any entity under namespace `My\Namespace`
                    'REST\Entity' => 'rest_entity'
                ],
            ],
        ],
    ],


];