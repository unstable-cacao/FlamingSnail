<?php
require_once __DIR__ . '/../../vendor/autoload.php';


foreach (glob('../Include/*.php') as $file)
{
    require_once $file;
}


echo jsonencode(['roomId' => 98739012]);die;


$server = new \WebServer\Server();
$server->config()->setConfigDirectory(realpath(__DIR__ . '/../../Config/Routing'));
$server->execute(['*']);