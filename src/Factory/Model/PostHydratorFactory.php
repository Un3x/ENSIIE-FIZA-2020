<?php


namespace Factory\Model;


class PostHydratorFactory implements \Factory\FactoryInterface
{

    public function createService ($sm)
    {
        return new \Model\PostHydrator();
    }
}