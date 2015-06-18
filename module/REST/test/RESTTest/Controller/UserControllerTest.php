<?php
/**
 * Created by PhpStorm.
 * User: vitalie
 * Date: 6/18/15
 * Time: 9:34 AM
 */

namespace RESTTest\Controller;


use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class UserControllerTest extends AbstractHttpControllerTestCase {
    protected $traceError = true;

    public function setup(){
        $this->setApplicationConfig(include __DIR__ . '/../../config/application.config.php');

    }

    public function testGetListAction(){

        /*$app = $this->getApplication();
        $sm = $app->getServiceManager();
        $em = $app->getEventManager();
        $config = $sm->get('Config');

        print_r($config);
        exit;*/

        //$this->dispatch('/rest/user');

        //$this->assertResponseStatusCode(200);
    }
}