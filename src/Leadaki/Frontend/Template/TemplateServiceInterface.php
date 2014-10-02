<?php

namespace Leadaki\Frontend\Template;

/**
 * Interface TemplateServiceInterface
 *
 * @package Leadaki\Frontend\Template
 */
interface TemplateServiceInterface
{
    /**
     * @param string $name
     * @param array  $parameters
     *
     * @return string
     */
    public function render($name, array $parameters = array());
} 
