<?php
require_once __DIR__ . '/../../vendor/autoload.php';

foreach (glob('../Include/*.php') as $file)
    require_once $file;

$server = new \WebServer\Server();
$server->config()->setConfigDirectory(realpath(__DIR__ . '/../Config/Routing'));
$server->execute(['*']);
?>

<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
