<?php
namespace Demo\User\Controller;

use Demo\Response\ResponseFactoryInterface;
use Demo\User\Repository\UserRepository;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
trait UserControllerTrait
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var ResponseFactoryInterface
     */
    protected $responseFactory;

    /**
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository, ResponseFactoryInterface $factory)
    {
        $this->repository = $repository;
        $this->responseFactory = $factory;
    }
}