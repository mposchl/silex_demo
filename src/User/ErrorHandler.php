<?php
namespace Demo\User;

use Demo\Response\ResponseFactoryInterface;
use Monolog\Logger;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class ErrorHandler
{
    const MSG_DEFAULT = "Something went wrong";

    /**
     * @var ResponseFactoryInterface
     */
    private $responseFactory;

    /**
     * @var Logger
     */
    private $logger;

    /**
     * @param ResponseFactoryInterface $factory
     */
    public function __construct(ResponseFactoryInterface $factory, Logger $logger)
    {
        $this->responseFactory = $factory;
        $this->logger = $logger;
    }

    /**
     * @param \Exception $e
     * @param Request $request
     * @param int $code
     * @return Response
     */
    public function handle(\Exception $e, Request $request, $code)
    {
        $this->logger->addError($e->getMessage(), $e->getTrace());
        switch ($code) {
            case Response::HTTP_BAD_REQUEST:
                return $this->responseFactory->create($e->getMessage(), $code);
            default:
                return $this->responseFactory->create(static::MSG_DEFAULT, $code);
        }
    }
}