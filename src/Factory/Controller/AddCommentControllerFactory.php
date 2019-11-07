<?php

namespace Factory\Controller;

class AddCommentControllerFactory implements \Factory\FactoryInterface
{

    public function createService ($sm)
    {
        return new \Controller\AddCommentController(
            $sm->get(\Factory\Model\CommentRepositoryFactory::class),
            $sm->get(\Factory\Service\AuthServiceFactory::class)
        );
    }
}