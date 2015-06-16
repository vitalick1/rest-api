<?php
/**
 * Created by PhpStorm.
 * User: vitalie
 * Date: 6/16/15
 * Time: 8:56 PM
 */

namespace REST\Controller\Factory;


use REST\Controller\UserController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserControllerFactory implements FactoryInterface {
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $userEntity = $serviceLocator->get('userEntity');
        $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');

        $controller = new UserController();
        $controller->setUserEntity($userEntity);
        $controller->setEntityManager($entityManager);

        return $controller;

    }

}