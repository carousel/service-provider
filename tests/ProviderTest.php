<?php

namespace Carousel\ServiceProvider;

use Carousel\Container;

class ProviderTest extends \PHPUnit\Framework\TestCase
{
    /**
    * Setup
    */
    public function setUp()
    {
        $this->provider = new CarServiceProvider;
    }
    /**
     * Test that provider implements interface
     *
     * @test
     */
    public function providerImplementsInterface()
    {
        $this->assertInstanceOf('Carousel\ServiceProvider\ProviderInterface', $this->provider);
    }
    /**
    * Test that provider object is registered in container
    *
    * @test
    */
    public function providesServiceThroughContainer()
    {
        $this->provider->register('car');
        $this->assertEquals(true, $this->provider->getContainer()->isBound('car'));
    }
}

/**
 * Test class
 */
class Car
{
    public function __construct()
    {
        echo get_class();
    }
}
class CarServiceProvider extends AbstractProvider
{
    public function register($key)
    {
        $this->container->bind($key, function () {
            return new Car();
        });
    }
}
