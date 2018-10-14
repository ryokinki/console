<?php

$url = new \Phalcon\Mvc\Url();
$dispatcher = new \Phalcon\Cli\Dispatcher();
$url->setBaseUri($config->application->baseUri);
$dispatcher->setActionSuffix('');
$dispatcher->setDefaultNamespace('App\Tasks');

$di->set('router', new \Phalcon\Cli\Router(), true);
$di->set('dispatcher', $dispatcher);
$di->set('url', $url, true);
$di->set('modelsManager', new \Phalcon\Mvc\Model\Manager(), true);
$di->set('modelsMetadata', new \Phalcon\Mvc\Model\Metadata\Memory(), true);
$di->set('response', new \Phalcon\Http\Response(), true);
$di->set('request', new \Phalcon\Http\Request(), true);
$di->set('filter', new \Phalcon\Filter(), true);
$di->set('escaper', new \Phalcon\Escaper(), true);
$di->set('eventsManager', new \Phalcon\Events\Manager(), true);
$di->set('transactionManager', new \Phalcon\Mvc\Model\Transaction\Manager(), true);
