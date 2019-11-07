<?php

namespace Factory\Model;

class UserRepositoryFactory implements \Factory\FactoryInterface
{


    public function createService ($sm)
    {
        return new \Model\UserRepository(
            $sm->get(\Factory\DatabaseAdapterFactory::class),
            $sm->get(\Factory\Model\UserHydratorFactory::class)
        );
    }
}