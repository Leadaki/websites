<?php

namespace Leadaki\Frontend\Router;

/**
 * Interface RouterMatchInterface
 *
 * @package Leadaki\Frontend\Router
 */
interface RouterMatchInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return array
     */
    public function getParameters();

    /**
     * @return array
     */
    public function getDefaults();
} 
