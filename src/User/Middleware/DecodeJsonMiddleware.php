<?php
namespace Demo\User\Middleware;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class DecodeJsonMiddleware implements InvokableMiddlewareInterface
{
    /**
     * @inheritdoc
     */
    public function invoke(Request $request, Application $app)
    {
        if (strpos($request->headers->get('Content-Type'), 'application/json') === 0) {

            $data = json_decode($request->getContent(), true);

            $request->request->replace(is_array($data) ? $data : array());
        }
    }
}