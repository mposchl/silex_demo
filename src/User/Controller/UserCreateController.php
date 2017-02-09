<?php
namespace Demo\User\Controller;

use Demo\User\Helper\UserHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class UserCreateController implements InvokableControllerInterface
{
    use UserControllerTrait;

    const MSG_CREATED = 'User created';

    /**
     * @inheritdoc
     */
    public function invoke(Request $request)
    {
        $user = UserHelper::prefillUser($request);

        $id = $this->repository->create($user);

        return $this->responseFactory->create(['id' => $id, 'msg' => static::MSG_CREATED], Response::HTTP_CREATED);
    }
}