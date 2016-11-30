<?php

namespace ITC\Foundation\Support\Test;

use ITC\Foundation\Support\Configurable;

class ConfigurableHost
{
    use Configurable;

    /**
     *
     *
     */
    public function defaults()
    {
        return [
            'foo' => 'one',
        ];
    }
}

class ConfigurableTest extends \TestCase
{

    public function setUp()
    {
        parent::setUp();
        $this->obj = new ConfigurableHost();
    }

    public function test_passes_if_defaults_are_assigned()
    {
        $this->assertEquals('one', $this->obj->option('foo'));
    }

    public function test_passes_if_option_method_returns_fallback_value()
    {
        $fallback = 'two';
        $this->assertEquals($fallback, $this->obj->option('bar', $fallback));
    }

    public function test_passes_if_configure_method_assigns_options()
    {
        $this->obj->configure(['foo'=>'two', 'bar'=>'three']);
        $this->assertEquals('two', $this->obj->option('foo'));
        $this->assertEquals('three', $this->obj->option('bar'));
    }
}

