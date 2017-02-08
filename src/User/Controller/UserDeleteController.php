<?php
namespace Demo\User\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class UserDeleteController  implements InvokableControllerInterface
{
    use UserControllerTrait;

    public function invoke(Request $request)
    {
        $userId = $request->get('userId');

        $this->repository->deleteById($userId);

        return $this->responseFactory->create('User deleted', Response::HTTP_OK);
    }
}