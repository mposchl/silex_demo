<?php
namespace Demo\Response;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
interface ResponseFactoryInterface
{
    /**
     * @param mixed $data
     * @param int $code
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create($data, $code);
}