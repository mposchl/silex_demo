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

        $app->error([$this->container->getByType($apiParams['error']), 'handle']);

        $this->mapAppRoutes($app, $apiParams['routes']);

        $this->mapMiddleware($app, $apiParams['middleware']);
    }

    /**
     * @param Application $app
     * @param array $routes
     */
    private function mapAppRoutes(Application $app, array $routes)
    {
        foreach ($routes as $path => $httpMethods)
        {
            foreach ($httpMethods as $method => $param) {
                if (!method_exists($app, $method)) {
                    throw new \InvalidArgumentException('Unknown method {$method}');
                }

                if (is_array($param)) {
                    $class = $param['controller'];
                    $middleware = isset($param['middleware']) ? $param['middleware'] : [];
                } else {
                    $class = $param;
                    $middleware = [];
                }
                $fluent = $app->$method($path, $this->createCallableString($class, 'invoke'));
                $this->mapMiddleware($fluent, $middleware);
            }
        }
    }

    /**
     * @param mixed $obj
     * @param array $middleware
     */
    private function mapMiddleware($obj, array $middleware)
    {
        foreach ($middleware as $when => $definition) {
            foreach ($definition as $class) {
                if (!is_callable([$obj, $when])) {
                    throw new \InvalidArgumentException("Unknown method {$when}");
                }
                $obj->$when([$this->container->getByType($class), 'invoke']);
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