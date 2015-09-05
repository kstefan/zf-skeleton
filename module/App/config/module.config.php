<?php

return [
    'router' => [
        'routes' => require __DIR__ . '/route.config.php',
    ],
    'service_manager' => require __DIR__ . '/service.config.php',
    'view_helpers' => require __DIR__ . '/view-helper.config.php',
    'translator' => [
        'locale' => 'cs',
        'translation_file_patterns' => [
            [
                'type' => 'PhpArray',
                'base_dir' => __DIR__ . '/../../../vendor/zendframework/zendframework/resources/languages',
                'pattern' => '%s/Zend_Validate.php',
                'text_domain' => 'default',
            ],
            [
                'type' => 'PhpArray',
                'base_dir' => __DIR__ . '/../../../vendor/zendframework/zendframework/resources/languages',
                'pattern' => '%s/Zend_Captcha.php',
                'text_domain' => 'default',
            ],
            [
                'type' => 'PhpArray',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.php',
                'text_domain' => 'default',
            ],
        ],
        'cache' => [
            'adapter' => 'memory',
        ],
    ],
    'controllers' => require __DIR__ . '/controller.config.php',
    'view_manager' => [
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
    'console' => [
        'router' => [
            'routes' => require __DIR__ . '/console.config.php',
        ],
    ],
    'session' => [
        'remember_me_seconds' => 60 * 60 * 24,
        'use_cookies' => true,
        'cookie_httponly' => true,
    ],
    'zfctwig' => [
        'helper_manager' => [
            'invokables' => [
                'partial'  => 'Zend\View\Helper\Partial',
                'paginationControl'  => 'Zend\View\Helper\PaginationControl',
            ]
        ],
    ],
    'app' => [
    ],
];
