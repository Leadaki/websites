<?php

namespace Leadaki\Frontend\Router;

/**
 * Class RouterMatch
 *
 * @author Jesús Urrutia <me@jesusurrutia.com>
 *
 * @package Leadaki\Frontend\Router
 */
class RouterMatch implements RouterMatchInterface
{
    /** @var string */
    private $name;

    /** @var array */
    private $parameters;

    /** @var array */
    private $defaults;

    /**
     * @param string $name
     * @param array $parameters
     * @param array $defaults
     */
    function __construct($name, $parameters, $defaults)
    {
        $this->name = $name;
        $this->parameters = $parameters;
        $this->defaults = $defaults;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @inheritdoc
     */
    public function getDefaults()
    {
        return $this->defaults;
    }

} 
