<?php

namespace Factory\Model;

class FeedRepositoryFactory implements \Factory\FactoryInterface
{


    public function createService ($sm)
    {
        return new \Model\FeedRepository(
            $sm->get(\Factory\DatabaseAdapterFactory::class)
        );
    }
}