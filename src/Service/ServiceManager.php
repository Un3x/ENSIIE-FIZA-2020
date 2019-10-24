<?php

namespace Service;

class ServiceManager
{
    /**
     * @var array
     */
    private $registry;

    public function get(string $serviceName)
    {
        if (isset($this->registry[$serviceName])) {
            return $this->registry[$serviceName];
        }
        $service = new $serviceName();
        if ($service instanceof \Factory\FactoryInterface) {
            $this->registry[$serviceName] = $service->createService($this);
        } else {
            $this->registry[$serviceName] = $service;
        }
        return $this->registry[$serviceName];
    }
}