<?php
/**
 * Created by PhpStorm.
 * User: vitalie
 * Date: 6/16/15
 * Time: 8:50 PM
 */

namespace REST\Entity\Factory;


use REST\Entity\User;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserFactory implements FactoryInterface {
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new User();
    }


}