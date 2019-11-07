<?php
namespace Controller;

Class IndexController
{
    function execute ()
    {
        return new \ViewModel('index', []);
    }
}