<?php


namespace Factory\Model;


class CommentHydratorFactory implements \Factory\FactoryInterface
{

    public function createService ($sm)
    {
        return new \Model\CommentHydrator();
    }
}