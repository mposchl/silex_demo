<?php
use Nette\DI\ContainerLoader;
use Nette\DI\Compiler;
use Nette\Loaders\RobotLoader;

use Demo\ApiMapper;
use Demo\Silex\DiServiceProvider;

define('APP_DIR', __DIR__ . '/..');
define('TEMP_DIR', APP_DIR . '/temp');
define('CONFIG_DIR', APP_DIR . '/config');
define('LOG_FILE', TEMP_DIR . '/error.log');

require_once APP_DIR . '/vendor/autoload.php';

$robot = new RobotLoader();
$robot->addDirectory(APP_DIR . '/src');
$robot->addDirectory(APP_DIR . '/tests');
$robot->setTempDirectory(TEMP_DIR);
$robot->register();

$loader = new ContainerLoader(TEMP_DIR);
$containerClass = $loader->load(function(Compiler $compiler){
    $compiler->loadConfig(CONFIG_DIR . '/params.neon');
    $compiler->loadConfig(CONFIG_DIR . '/api.neon');
    $compiler->loadConfig(CONFIG_DIR . '/di.neon');
});