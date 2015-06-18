<?php
/**
 * Created by PhpStorm.
 * User: vitalie
 * Date: 6/18/15
 * Time: 11:32 AM
 */

namespace REST\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {

    public function indexAction(){

        return new ViewModel();

    }

}