<?php
namespace Controller;

Class SubscribeController {
    function execute () {
        include_once '../src/view/layout.php';
        generateView('subscribe');
    }
}
