<?php

namespace Carousel\ServiceProvider;

use Carousel\ServiceProvider\ProviderInterface;
use Carousel\Container;

abstract class AbstractProvider implements ProviderInterface
{
    /**
    * Setup dependency
    */
    public function __construct()
    {
        $this->container = new Container;
    }
    /**
     * Get container instance
     *
     * @return new Container
     */

    public function getContainer()
    {
        return $this->container;
    }
    /**
     * Register new provider in container
     *
     * @return provider object
     */
    
    abstract public function register($key);
}
