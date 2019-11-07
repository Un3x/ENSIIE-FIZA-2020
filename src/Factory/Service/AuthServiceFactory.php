<?php

namespace Factory\Service;

class AuthServiceFactory implements \Factory\FactoryInterface
{


    public function createService ($sm)
    {
        return new \Service\AuthService(
            $sm->get(\Factory\Model\UserRepositoryFactory::class)
        );
    }
}