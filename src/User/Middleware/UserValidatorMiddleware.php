<?php
namespace Demo\User\Middleware;

use Demo\User\Repository\UserRepository;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class UserValidatorMiddleware implements InvokableMiddlewareInterface
{
    const MSG_FIRSTNAME_MISSING = 'Invalid user first name or missing';
    const MSG_LASTNAME_MISSING = 'Invalid user last name or missing';
    const MSG_BAD_LOGIN_FORMAT = 'Invalid user login format or missing.';
    const MSG_LOGIN_EXISTS = 'Login already exists';

    /**
     * @var array
     */
    private $errors = [];

    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * UserValidatorMiddleware constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @inheritdoc
     */
    public function invoke(Request $request, Application $app)
    {
        $user = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'login' => $request->get('login')
        ];
        if ($this->valid($user) !== true) {
            $app->abort(Response::HTTP_BAD_REQUEST, implode(', ', $this->errors));
        }
    }

    /**
     * @param array $user
     * @return bool
     */
    private function valid(array $user)
    {
        if (empty($user['first_name'])) {
            $this->errors[] = static::MSG_FIRSTNAME_MISSING;
        }
        if (empty($user['last_name'])) {
            $this->errors[] = static::MSG_LASTNAME_MISSING;
        }

        $this->validateLogin($user['login']);

        return count($this->errors) == 0;
    }

    /**
     * @param string $login
     */
    private function validateLogin($login)
    {
        if (!preg_match("/[a-z]{6}[0-9]{2}/", $login)) {
            $this->errors[] = static::MSG_BAD_LOGIN_FORMAT;
            return;
        }
        if ($this->repository->findByLogin($login)) {
            $this->errors[] = static::MSG_LOGIN_EXISTS;
        }
    }
}