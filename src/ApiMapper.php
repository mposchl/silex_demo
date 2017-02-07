<?php
namespace Demo;

use Nette\DI\Container;
use Silex\Application;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class ApiMapper
{
    /**
     * @var Container
     */
    private $container;

    /**
     * ApiMapper constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param Application $app
     */
    public function map(Application $app)
    {
        $apiParams = $this->container->getParameters()['api'];

        foreach ($apiParams['routes'] as $path => $httpMethods)
        {
            foreach ($httpMethods as $method => $params) {
                $app->$method($path, $this->createCallableString($params['controller'], $params['method']));
            }
        }
    }

    /**
     * @param string $controller
     * @param string $method
     * @return string
     */
    private function createCallableString($controller, $method)
    {
        return $controller . '::' . $method;
    }
}