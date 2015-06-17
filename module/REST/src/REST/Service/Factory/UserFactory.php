<?php
/**
 * Created by PhpStorm.
 * User: vitalie
 * Date: 6/16/15
 * Time: 9:51 PM
 */

namespace REST\Service\Factory;


use REST\Service\User;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserFactory implements FactoryInterface {
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $sl)
    {
        $userEntity = $sl->get('userEntity');
        $entityManager = $sl->get('Doctrine\ORM\EntityManager');
        $hydrator = $sl->get('hydrator');

        return new User($userEntity, $entityManager, $hydrator);
    }


}