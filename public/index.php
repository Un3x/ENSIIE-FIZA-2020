<?php
include_once('../src/Controller/FeedController.php');
include_once('../src/Controller/CommentController.php');
include_once('../src/Controller/IndexController.php');
include_once('../src/Controller/SubscribeController.php');

include_once('../src/Model/CommentRepository.php');
include_once('../src/Model/FeedRepository.php');

$dbh = new PDO('pgsql:host=localhost;port=5432;dbname=iinstagrame', 'iinstagrame', 'patate');

$urlWithoutParams = explode ('?', $_SERVER['REQUEST_URI']);
$urlParts = explode('/',$urlWithoutParams[0]);
$urlController = $urlParts[1] !== '' ? $urlParts[1] : 'Index';
$controllerName = '\Controller\\'. ucfirst($urlController). 'Controller';
if (class_exists($controllerName)) {
    $instance = new $controllerName($dbh);
    $instance->execute();
} else {
    include_once '404.php';
}

