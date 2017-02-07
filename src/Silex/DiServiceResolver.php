<?php
namespace Demo\Silex;

use Nette\DI\Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class DiServiceResolver implements ControllerResolverInterface
{
    const DELIMITER = '::';

    /**
     * @var Container
     */
    private $container;

    /**
     * @var ControllerResolverInterface
     */
    private $controllerResolver;

    /**
     * @param Container $container
     */
    public function __construct(Container $container, ControllerResolverInterface $controllerResolver)
    {
        $this->container = $container;
        $this->controllerResolver = $controllerResolver;
    }

    /**
     * {@inheritdoc}
     */
    public function getController(Request $request)
    {
        $controller = $request->attributes->get('_controller', null);

        list($class, $method) = explode(static::DELIMITER, $controller);

        $object = $this->container->getByType($class);

        return array($object, $method);
    }

    /**
     * {@inheritdoc}
     */
    public function getArguments(Request $request, $controller)
    {
        return $this->controllerResolver->getArguments($request, $controller);
    }
}