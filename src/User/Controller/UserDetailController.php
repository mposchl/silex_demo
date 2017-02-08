<?php
namespace Demo\User\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class UserDetailController  implements InvokableControllerInterface
{
    use UserControllerTrait;

    const MSG_USER_NOT_FOUND = 'User not found';

    /**
     * @inheritdoc
     */
    public function invoke(Request $request)
    {
        $userId = $request->get('userId');

        $user = $this->repository->findById($userId);

        if (!$user) {
            return $this->responseFactory->create(static::MSG_USER_NOT_FOUND, Response::HTTP_NOT_FOUND);
        }

        return $this->responseFactory->create($user, Response::HTTP_OK);
    }

}