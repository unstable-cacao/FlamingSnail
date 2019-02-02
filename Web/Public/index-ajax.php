<?php
require_once __DIR__ . '/../../vendor/autoload.php';


foreach (glob('../Include/*.php') as $file)
{
    require_once $file;
}


$server = new \WebServer\Server();
$server->config()->setConfigDirectory(realpath(__DIR__ . '/../Config/Routing'));
$server->execute(['*']);