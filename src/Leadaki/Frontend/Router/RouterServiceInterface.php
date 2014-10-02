<?php

namespace Leadaki\Frontend\Router;

/**
 * Interface RouterServiceInterface
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
