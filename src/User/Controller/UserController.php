<?php
namespace Demo\User\Controller;

use Demo\User\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class UserController
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listAction()
    {
        $users = $this->repository->findAll();

        return new JsonResponse($users);
    }

    public function createAction()
    {
        
    }

    public function detailAction($userId)
    {
        $user = $this->repository->findById($id);
    }

    public function updateAction()
    {

    }
}