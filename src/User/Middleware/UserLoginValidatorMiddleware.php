<?php
namespace Demo\User\Middleware;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class UserLoginValidatorMiddleware implements InvokableMiddlewareInterface
{
    use RepositoryAwareTrait;

    const MSG_LOGIN_EXISTS = 'Login already exists';

    /**
     * @inheritdoc
     */
    public function invoke(Request $request, Application $app)
    {
        $login = $request->get('login');

        if ($this->repository->findByLogin($login)) {
            $app->abort(Response::HTTP_FOUND, static::MSG_LOGIN_EXISTS);
        }
    }
}