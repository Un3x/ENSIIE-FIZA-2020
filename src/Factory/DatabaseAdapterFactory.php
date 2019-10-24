<?php


namespace Factory;


class DatabaseAdapterFactory implements FactoryInterface
{

    public function createService ($sm)
    {
        return new \PDO('pgsql:host=localhost;port=5432;dbname=iinstagrame', 'iinstagrame', 'patate');
    }
}