<?php
namespace Demo\User\Middleware;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class LoginMiddleware implements InvokableMiddlewareInterface
{
    /**
     * @inheritdoc
     */
    public function invoke(Request $request, Application $app)
    {
        //fixme implement some authentication
    }
}