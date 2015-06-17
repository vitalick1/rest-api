<?php
/**
 * Created by PhpStorm.
 * User: vitalie
 * Date: 6/16/15
 * Time: 9:49 PM
 */

namespace REST\Service;

use REST\Entity\User as UserEntity;
use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator\ClassMethods;

class User{

    /**
     * @var UserEntity
     */
    protected $userEntity;

    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var ClassMethods
     */
    protected $hydrator;


    function __construct($userEntity, $entityManager, $hydrator)
    {
        $this->userEntity = $userEntity;
        $this->entityManager = $entityManager;
        $this->hydrator = $hydrator;
    }

    public function getList(){
        $hydrator = $this->getHydrator();

        $list = $this->getEntityManager()->getRepository('REST\Entity\User')->findAll();

        $list = array_map(function($entity) use ($hydrator) {
            return $hydrator->extract($entity);
        }, $list);
        return $list;
    }

    /**
     * @return UserEntity
     */
    public function getUserEntity()
    {
        return $this->userEntity;
    }

    /**
     * @param UserEntity $userEntity
     */
    public function setUserEntity($userEntity)
    {
        $this->userEntity = $userEntity;
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param EntityManager $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return ClassMethods
     */
    public function getHydrator()
    {
        return $this->hydrator;
    }

    /**
     * @param ClassMethods $hydrator
     */
    public function setHydrator($hydrator)
    {
        $this->hydrator = $hydrator;
    }


}