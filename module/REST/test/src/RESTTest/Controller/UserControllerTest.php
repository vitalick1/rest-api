<?php
/**
 * Created by PhpStorm.
 * User: vitalie
 * Date: 6/18/15
 * Time: 9:34 AM
 */

namespace RESTTest\Controller;


use Zend\Http\Header\Accept;
use Zend\Http\Header\GenericHeader;
use Zend\Http\Headers;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class UserControllerTest extends AbstractHttpControllerTestCase {
    protected $traceError = true;

    public function setup(){
        $this->setApplicationConfig(include __DIR__ . '/../../../config/application.config.php');
    }

    public function testGetListAction(){
        $headers = new Headers();
        $headers->addHeaderLine('Accept: application/json');

        $this->getRequest()->setHeaders($headers);

        $this->dispatch('/rest/user');

        $this->assertResponseStatusCode(200);



    }
}