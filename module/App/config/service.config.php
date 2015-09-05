<?php

return [
    'invokables' => [
    ],
    'abstract_factories' => [
        'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
        'Zend\Log\LoggerAbstractServiceFactory',
    ],
    'aliases' => [
        'translator' => 'MvcTranslator',
        'App\Translator' => 'MvcTranslator',
        'App\EntityManager' => 'Doctrine\ORM\EntityManager',
    ],
    'factories' => [
        'App\ExceptionLoggerListener' => 'App\ExceptionLoggerListenerFactory',
        'App\Logger' => 'App\LoggerFactory',
    ],
];
