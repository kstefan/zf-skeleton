<?php

return [
    'home' => [
        'type' => 'Zend\Mvc\Router\Http\Segment',
        'options' => [
            'route' => '/[:locale]',
            'defaults' => [
                'controller' => 'App\Controller\IndexController',
                'action' => 'index',
                'locale' => 'cs'
            ],
            'constraints' => array(
                'locale' => '(cs)?',
            ),
        ],
        'may_terminate' => true,
        'child_routes' => [
        ],
    ],
];
