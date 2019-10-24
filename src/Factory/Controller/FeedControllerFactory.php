<?php

namespace Factory\Controller;

class FeedControllerFactory implements \Factory\FactoryInterface
{

    public function createService ($sm)
    {
        return new \Controller\FeedController(
            $sm->get(\Factory\Model\FeedRepositoryFactory::class),
            $sm->get(\Factory\Model\UserRepositoryFactory::class)
        );
    }
}