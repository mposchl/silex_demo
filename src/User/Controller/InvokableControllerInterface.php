<?php
namespace Demo\User\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
interface InvokableControllerInterface
{
    /**
     * @param Request $request
     * @return Response
     */
    public function invoke(Request $request);
}