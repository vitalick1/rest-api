<?php
/**
 * Created by PhpStorm.
 * User: vitalie
 * Date: 6/16/15
 * Time: 4:10 PM
 */

namespace RESTTest;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ControllerTestCase extends AbstractHttpControllerTestCase
{

    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        $this->setApplicationConfig(include __DIR__ . '/../../../../config/application.config.php');
        parent::__construct($name, $data, $dataName); // TODO: Change the autogenerated stub
    }


}