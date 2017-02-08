<?php
namespace Demo\User\Helper;

use Symfony\Component\HttpFoundation\Request;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class UserHelper
{
    public static function prefillUser(Request $request)
    {
        return [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'login' => $request->get('login')
        ];
    }
}