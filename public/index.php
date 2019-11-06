<?php

use Factory\DatabaseAdapterFactory;

include_once('../src/Service/ServiceManager.php');
include_once('../src/Factory/FactoryInterface.php');

include_once('../src/Controller/FeedController.php');
include_once('../src/Controller/CommentController.php');
include_once('../src/Controller/IndexController.php');
include_once('../src/Controller/SubscribeController.php');
include_once('../src/Controller/ConnectController.php');
include_once('../src/Controller/AddUserController.php');
include_once('../src/Controller/LogoutController.php');
include_once('../src/Controller/AddPostController.php');
include_once('../src/Controller/AddCommentController.php');
include_once('../src/Controller/LikePostController.php');
include_once('../src/Controller/UnlikePostController.php');

include_once('../src/Factory/Controller/FeedControllerFactory.php');
include_once('../src/Factory/Controller/CommentControllerFactory.php');
include_once('../src/Factory/Controller/IndexControllerFactory.php');
include_once('../src/Factory/Controller/SubscribeControllerFactory.php');
include_once('../src/Factory/Controller/ConnectControllerFactory.php');
include_once('../src/Factory/Controller/AddUserControllerFactory.php');
include_once('../src/Factory/Controller/LogoutControllerFactory.php');
include_once('../src/Factory/Controller/AddPostControllerFactory.php');
include_once('../src/Factory/Controller/AddCommentControllerFactory.php');
include_once('../src/Factory/Controller/LikePostControllerFactory.php');
include_once('../src/Factory/Controller/UnlikePostControllerFactory.php');

include_once('../src/Model/CommentRepository.php');
include_once('../src/Model/FeedRepository.php');
include_once('../src/Model/UserRepository.php');
include_once('../src/Model/LikeRepository.php');

include_once('../src/Factory/Model/CommentRepositoryFactory.php');
include_once('../src/Factory/Model/FeedRepositoryFactory.php');
include_once('../src/Factory/Model/UserRepositoryFactory.php');
include_once('../src/Factory/Model/LikeRepositoryFactory.php');


include_once('../src/Factory/DatabaseAdapterFactory.php');

session_start();

$serviceManager = new \Service\ServiceManager();

$urlWithoutParams = explode ('?', $_SERVER['REQUEST_URI']);
$urlParts = explode('/',$urlWithoutParams[0]);
$urlController = $urlParts[1] !== '' ? $urlParts[1] : 'Index';
$controllerName = '\Controller\\'. ucfirst($urlController). 'Controller';
$factoryName = '\Factory\\Controller\\'. ucfirst($urlController). 'ControllerFactory';
if (class_exists($controllerName)) {
    $instance = $serviceManager->get($factoryName);
    $instance->execute();
} else {
    include_once '404.php';
}

