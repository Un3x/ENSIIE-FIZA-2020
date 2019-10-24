<?php

namespace Factory\Controller;

class IndexControllerFactory implements \Factory\FactoryInterface
{

    public function createService ($sm)
    {
        return new \Controller\IndexController();
    }
}