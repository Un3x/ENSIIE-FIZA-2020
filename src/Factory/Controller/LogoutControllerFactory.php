<?php

namespace Factory\Controller;

class LogoutControllerFactory implements \Factory\FactoryInterface
{

    public function createService ($sm)
    {
        return new \Controller\LogoutController();
    }
}