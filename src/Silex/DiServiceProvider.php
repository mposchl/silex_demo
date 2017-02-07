<?php
namespace Demo\Silex;

use Nette\DI\Container;
use Pimple\ServiceProviderInterface;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class DiServiceProvider implements ServiceProviderInterface
{
    /**
     * @var Container
     */
    private $container;

    /**
     * DiServiceProvider constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param \Pimple\Container $pimple
     */
    public function register(\Pimple\Container $pimple)
    {
        $pimple->extend('resolver', function ($controllerResolver) {
            return new DiServiceResolver($this->container, $controllerResolver);
        });
    }

}