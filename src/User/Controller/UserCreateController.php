<?php
namespace Demo\User\Controller;

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
        $user = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'login' => $request->get('login')
        ];

        $this->repository->create($user);

        return $this->responseFactory->create(static::MSG_CREATED, Response::HTTP_CREATED);
    }
}