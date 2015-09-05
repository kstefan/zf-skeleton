<?php

namespace App;

use Zend\Log\Logger;
use Zend\Log\Writer\Stream;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoggerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $file = __DIR__ . '/../../../../log/log_' . date('Y_m_d') . '.log';
        if (!is_file($file)) {
            touch ($file);
            chmod($file, 0666);
        }
        $logger = new Logger();
        $writer = new Stream($file);
        $logger->addWriter($writer);
        return $logger;
    }

}
