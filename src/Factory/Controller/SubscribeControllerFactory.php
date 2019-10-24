<?php

namespace Factory\Controller;

class SubscribeControllerFactory implements \Factory\FactoryInterface
{

    public function createService ($sm)
    {
        return new \Controller\SubscribeController();
    }
}