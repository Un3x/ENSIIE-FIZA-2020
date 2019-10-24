<?php
namespace Controller;

Class IndexController
{
    function execute ()
    {
        include_once '../src/view/layout.php';
        generateView('index');
    }
}