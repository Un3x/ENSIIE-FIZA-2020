<?php

namespace Factory\Model;

class LikeRepositoryFactory implements \Factory\FactoryInterface
{


    public function createService ($sm)
    {
        return new \Model\LikeRepository(
            $sm->get(\Factory\DatabaseAdapterFactory::class)
        );
    }
}