<?php
return array(
    'router' => array(
        'routes' => array(
            'user' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/rest/user[/:id]',
                    'constraints' => array(
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'REST\Controller\User',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'factories' => [
            'REST\Controller\User' => 'REST\Controller\Factory\UserControllerFactory'
        ]
    ),

    'service_manager' => [
        'factories' => [
            'userEntity' => 'REST\Entity\Factory\UserFactory'
        ]
    ],

    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy'
        )
    ),

    'doctrine' => array(
        'driver' => array(
            // defines an annotation driver with two paths, and names it `my_annotation_driver`
            'rest_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/REST/Entity',
                ),
            ),

            // default metadata driver, aggregates all other drivers into a single one.
            // Override `orm_default` only if you know what you're doing
            'orm_default' => array(
                'drivers' => array(
                    // register `my_annotation_driver` for any entity under namespace `My\Namespace`
                    'REST\Entity' => 'rest_entity'
                )
            )
        )
    )


);