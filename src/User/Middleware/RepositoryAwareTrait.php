<?php
namespace Demo\User\Middleware;

use Demo\User\Repository\UserRepository;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
trait RepositoryAwareTrait
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * UserValidatorMiddleware constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
}