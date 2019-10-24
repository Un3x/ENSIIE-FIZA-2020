<?php

namespace Factory\Controller;

class ConnectControllerFactory implements \Factory\FactoryInterface
{

    public function createService ($sm)
    {
        return new \Controller\ConnectController(
            $sm->get(\Factory\Model\UserRepositoryFactory::class)
        );
    }
}