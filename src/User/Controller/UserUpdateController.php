<?php
namespace Demo\User\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class UserUpdateController implements InvokableControllerInterface
{
    use UserControllerTrait;

    public function invoke(Request $request)
    {
        // TODO: Implement invoke() method.
    }

}