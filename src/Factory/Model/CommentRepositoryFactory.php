<?php

namespace Factory\Model;

class CommentRepositoryFactory implements \Factory\FactoryInterface
{


    public function createService ($sm)
    {
        return new \Model\CommentRepository(
            $sm->get(\Factory\DatabaseAdapterFactory::class)
        );
    }
}