<?php

namespace Factory\Controller;

class UnlikePostControllerFactory implements \Factory\FactoryInterface
{

    public function createService ($sm)
    {
        return new \Controller\UnlikePostController(
            $sm->get(\Factory\Model\LikeRepositoryFactory::class),
            $sm->get(\Factory\Model\UserRepositoryFactory::class)
        );
    }
}