<?php
namespace Demo\Response;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class JsonResponseFactory implements ResponseFactoryInterface
{
    public function create($data, $code) {
        return new JsonResponse($data, $code);
    }
}