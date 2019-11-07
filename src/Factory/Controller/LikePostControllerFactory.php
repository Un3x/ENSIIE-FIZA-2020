<?php

namespace Factory\Controller;

class LikePostControllerFactory implements \Factory\FactoryInterface
{

    public function createService ($sm)
    {
        return new \Controller\LikePostController(
            $sm->get(\Factory\Model\LikeRepositoryFactory::class),
            $sm->get(\Factory\Service\AuthServiceFactory::class)
        );
    }
}