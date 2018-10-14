<?php

define('BASE_PATH', dirname(__DIR__));
define('COMMON_PATH', realpath( BASE_PATH . '/../common'));
define('APP_PATH', BASE_PATH . '/app');
define('CONSOLE', true);

//优雅重启 php cli -SIGHUP
pcntl_signal(SIGHUP, function($signo) {
	\App\Library\Status::reload();
});

foreach($argv as $k => $arg) {
	 if($k >= 3) {
		 if (($pos = strpos($arg, 'env')) !== false) {
			 $env = substr($arg, strpos($arg, '=') + 1);
			 $env = trim($env);
		     $_SERVER['ENV'] = $env;
			 break;
		 }
	 }
}

$di = new \Phalcon\Di();
$di->setShared('config', include APP_PATH . '/config/config.php');
/**
 * Get config service for use in inline setup below
 */
$config = $di->getConfig();

/**
 * Include general services
 */
include APP_PATH . '/config/services.php';

/**
 * Include Autoloader
 */
include APP_PATH . '/config/loader.php';

/**
 * Create a console application
 */
$console = new \Phalcon\Cli\Console($di);

try {
	$console->setArgument($argv);
    $console->handle();
    if (isset($config["printNewLine"]) && $config["printNewLine"]) {
        echo PHP_EOL;
    }

} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    echo $e->getTraceAsString() . PHP_EOL;
    exit(255);
}
