<?php

namespace Factory\Controller;

class AddUserControllerFactory implements \Factory\FactoryInterface
{

    public function createService ($sm)
    {
        return new \Controller\addUserController(
            $sm->get(\Factory\Model\UserRepositoryFactory::class)
        );
    }
}