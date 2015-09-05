<?php
return [
    'doctrine' => [
        'driver' => [
            'app_annotation_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../../module/App/src/App/Entity',
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    'App\Entity' => 'app_annotation_driver'
                ],
            ],
        ],
        'connection' => [
            'orm_default' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => [
                    'host' => 'host',
                    'port' => '3306',
                    'user' => 'user',
                    'password' => 'password',
                    'dbname' => 'dbname',
                    'driverOptions' => [
                        1002 => 'SET NAMES utf8',
                    ],
                ],
            ],
        ],
        'configuration' => [
            'orm_default' => [
                'metadata_cache' => 'array',
                'query_cache' => 'array',
                'result_cache' => 'array',
                'generate_proxies' => true,
                'proxy_dir' => 'data/doctrine/proxy',
                'naming_strategy' => 'Doctrine\ORM\Mapping\UnderscoreNamingStrategy',
            ],
        ],
        'migrations_configuration' => [
            'orm_default' => [
                'directory' => 'sql/migrations',
                'namespace' => 'DoctrineMigrations',
                'table' => 'doctrine_migration_versions',
            ],
        ],
    ],
    'service_manager' => [
        'invokables' => [
            'Doctrine\ORM\Mapping\UnderscoreNamingStrategy' => 'Doctrine\ORM\Mapping\UnderscoreNamingStrategy',
        ],
    ],
];
