<?php


namespace Factory\Model;


class UserHydratorFactory implements \Factory\FactoryInterface
{

    public function createService ($sm)
    {
        return new \Model\UserHydrator();
    }
}