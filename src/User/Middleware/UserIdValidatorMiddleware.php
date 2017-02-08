<?php
namespace Demo\User\Middleware;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class UserIdValidatorMiddleware implements InvokableMiddlewareInterface
{
    use RepositoryAwareTrait;

    const MSG_USER_DOES_NOT_EXIST = "User does not exist";

    /**
     * @inheritdoc
     */
    public function invoke(Request $request, Application $app)
    {
        $userId = $request->get('userId');

        if ($this->valid($userId) !== true) {
            $app->abort(Response::HTTP_NOT_FOUND, static::MSG_USER_DOES_NOT_EXIST);
        }
    }

    /**
     * @param int $userId
     * @return bool
     */
    private function valid($userId)
    {
        $user = $this->repository->findById($userId);

        return (bool)$user;
    }

}