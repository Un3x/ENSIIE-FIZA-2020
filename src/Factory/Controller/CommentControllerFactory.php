<?php

namespace Factory\Controller;

class CommentControllerFactory implements \Factory\FactoryInterface
{

    public function createService ($sm)
    {
        return new \Controller\CommentController(
            $sm->get(\Factory\Model\CommentRepositoryFactory::class)
        );
    }
}