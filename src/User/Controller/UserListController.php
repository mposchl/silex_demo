<?php
namespace Demo\User\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class UserListController implements InvokableControllerInterface
{
    use UserControllerTrait;

    /**
     * @inheritdoc
     */
    public function invoke(Request $request)
    {
        $users = $this->repository->findAll();

        return $this->responseFactory->create($users, Response::HTTP_OK);
    }
}