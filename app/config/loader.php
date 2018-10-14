<?php

$loader = new \Phalcon\Loader();
$loader->registerFiles([
	COMMON_PATH.'/utils/func.php',
])
->registerNamespaces([
	'Pheanstalk' => COMMON_PATH.'/vendor/pheanstalk/',
	'Queue' => COMMON_PATH.'/vendor/queue/',
	'App\Status' => COMMON_PATH.'/status.php',
	'App\Tasks' => $config->application->taskDir,
	'App\Jobs' => $config->application->jobDir,
])->register();
