<?php
/**
 * YAWIK
 *
 * @filesource
 * @copyright (c) 2013 - 2016 Cross Solution (http://cross-solution.de)
 * @license       MIT
 */

namespace AuthTest\Factory\Controller;

use PHPUnit\Framework\TestCase;

use Auth\Factory\Controller\RegisterControllerFactory;
use Auth\Options\ModuleOptions;
use CoreTest\Bootstrap;
use Zend\Mvc\Controller\ControllerManager;

class RegisterControllerFactoryTest extends TestCase
{
    /**
     * @var RegisterControllerFactory
     */
    private $testedObj;

    protected function setUp(): void
    {
        $this->testedObj = new RegisterControllerFactory();
    }

    public function testCreateService()
    {
        $sm = clone Bootstrap::getServiceManager();
        $sm->setAllowOverride(true);

        $registerServiceMock = $this->getMockBuilder('Auth\Service\Register')
            ->disableOriginalConstructor()
            ->getMock();

        $loggerMock = $this->getMockBuilder('Zend\Log\LoggerInterface')->getMock();
        
        $options = new ModuleOptions();

        $sm->setService('Auth\Service\Register', $registerServiceMock);
        $sm->setService('Core/Log', $loggerMock);
        $sm->setService('Auth/ModuleOptions', $options);

        $result = $this->testedObj->createService($sm);

        $this->assertInstanceOf('Auth\Controller\RegisterController', $result);
    }
}
