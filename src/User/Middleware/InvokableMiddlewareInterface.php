<?php
namespace Demo\User\Middleware;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
interface InvokableMiddlewareInterface
{
    /**
     * @param Request $request
     * @param Application $app
     */
    public function invoke(Request $request, Application $app);
}