<?php
namespace Demo\User\Controller;

use Demo\User\Helper\UserHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class UserUpdateController implements InvokableControllerInterface
{
    use UserControllerTrait;

    const MSG_UPDATED = 'User updated';

    /**
     * @inheritdoc
     */
    public function invoke(Request $request)
    {
        $userId = $request->get('userId');

        $user = UserHelper::prefillUser($request);

        $this->repository->updateById($userId, $user);

        return $this->responseFactory->create(static::MSG_UPDATED, Response::HTTP_OK);
    }

}