<?php
namespace App;

use Zend\I18n\Translator\Translator;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceManager;
use Zend\Session\Config\SessionConfig;
use Zend\Session\SessionManager;
use Zend\Session\Container as SessionContainer;
use Zend\Validator\AbstractValidator;

class Module
{
    public function onBootstrap(MvcEvent $e) {
        $evm = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($evm);
        /** @var ServiceManager $sm */
        $sm = $e->getApplication()->getServiceManager();
        $evm->attachAggregate($sm->get('App\ExceptionLoggerListener'));

        $config = $e->getApplication()
            ->getServiceManager()
            ->get('config');

        $sessionConfig = new SessionConfig();
        $sessionConfig->setOptions($config['session']);
        $sessionManager = new SessionManager($sessionConfig);
        $sessionManager->start();
        SessionContainer::setDefaultManager($sessionManager);

        $evm->attach(MvcEvent::EVENT_DISPATCH, function (MvcEvent $e) {
            $this->initEnv($e);
        }, 100);
    }

    public function initEnv(MvcEvent $e) {
        $sm = $e->getApplication()->getServiceManager();
        /** @var Translator $translator */
        $translator = $sm->get('App\Translator');
        $locale = $e->getRouteMatch()->getParam('locale', 'cs');
        $translator->setLocale($locale);
        AbstractValidator::setDefaultTranslator($translator);
        \Locale::setDefault($locale);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ],
            ],
        ];
    }

}
