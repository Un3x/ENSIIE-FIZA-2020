<?php

namespace Factory\Controller;

class AddPostControllerFactory implements \Factory\FactoryInterface
{

    public function createService ($sm)
    {
        return new \Controller\AddPostController(
            $sm->get(\Factory\Model\FeedRepositoryFactory::class),
            $sm->get(\Factory\Model\UserRepositoryFactory::class)
        );
    }
}