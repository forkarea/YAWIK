<?php
/**
 * YAWIK
 * Auth Module Bootstrap
 *
 * @copyright (c) 2013-2014 Cross Solution (http://cross-solution.de)
 * @license   MIT
 */

namespace Admin;

use Zend\Mvc\MvcEvent;

/**
 * Bootstrap class of the Admin module
 * 
 */
/**
 * Bootstrap class of the Admin Module
 */
class Module
{
    /**
     * indicates, that the autoload configuration for this module should be loaded.
     * @see
     *
     * @var bool
     */
    public static $isLoaded=false;


    function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * Loads module specific autoloader configuration.
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    function onBootstrap()
    {
        self::$isLoaded=true;
    }
}
