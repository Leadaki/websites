<?php

namespace Leadaki\Frontend\Router;

/**
 * Interface RouterServiceInterface
 *
 * @author Jesús Urrutia <me@jesusurrutia.com>
 *
 * @package Leadaki\Frontend\Router
 */
interface RouterServiceInterface
{
    /**
     * Generate url from name with parameters
     *
     * @param string $name
     * @param array  $parameters
     *
     * @return string
     */
    public function generate($name, array $parameters = array());

    /**
     * @return RouterMatchInterface
     */
    public function match();
} 
