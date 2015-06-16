<?php
/**
 * Created by PhpStorm.
 * User: vitalie
 * Date: 6/16/15
 * Time: 4:14 PM
 */

namespace REST\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use REST\Entity\User;
use Doctrine\ORM\EntityManager;

class UserController extends AbstractRestfulController {

    protected $acceptCriteria = array(
        'Zend\View\Model\JsonModel' => array(
            'application/json',
        ),
    );

    /**
     * @var User
     */
    protected $userEntity;

    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function get($id)
    {
        $model = $this->acceptableViewModelSelector($this->acceptCriteria);
        $model->id = $id;

        return $model;
    }

    public function create($data)
    {


        return parent::create($data); // TODO: Change the autogenerated stub
    }

    public function delete($id)
    {
        return parent::delete($id); // TODO: Change the autogenerated stub
    }

    public function deleteList($data)
    {
        return parent::deleteList($data); // TODO: Change the autogenerated stub
    }

    public function getList()
    {
        return parent::getList(); // TODO: Change the autogenerated stub
    }

    /**
     * @return User
     */
    public function getUserEntity()
    {
        return $this->userEntity;
    }

    /**
     * @param User $userEntity
     */
    public function setUserEntity($userEntity)
    {
        $this->userEntity = $userEntity;
    }

    /**
     * @return array
     */
    public function getAcceptCriteria()
    {
        return $this->acceptCriteria;
    }

    /**
     * @param array $acceptCriteria
     */
    public function setAcceptCriteria($acceptCriteria)
    {
        $this->acceptCriteria = $acceptCriteria;
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


}