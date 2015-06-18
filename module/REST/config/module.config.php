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
        ],
    ],
    'controllers' => [
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