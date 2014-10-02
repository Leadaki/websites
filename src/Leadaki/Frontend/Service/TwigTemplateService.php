<?php

namespace Leadaki\Frontend\Service;

use Leadaki\Frontend\Template\TemplateServiceInterface;

class TwigTemplateService implements TemplateServiceInterface
{
    /** @var \Twig_Environment */
    private $twig;

    /** @var array */
    private $config;

    /**
     * @param array $options
     */
    public function __construct($options = array())
    {
        $defaults = array(
            'templates_folder' => '',
            'templates_cache_folder' => '',
            'debug' => true,
        );

        $this->config = array_merge($defaults, $options);

        $loader = new \Twig_Loader_Filesystem($this->config['templates_folder']);

        $this->twig = new \Twig_Environment($loader, array(
            'cache' => $this->config['templates_cache_folder'],
            'debug' => $this->config['debug'],
        ));
    }

    /**
     * @inheritdoc
     */
    public function render($name, array $parameters = array())
    {
        return $this->twig->render($name, $parameters);
    }

    public function addFunction($name, \Closure $callable)
    {
        $this->twig->addFunction(new \Twig_SimpleFunction($name, $callable));
    }

    public function addExtension(\Twig_Extension $extension)
    {
        $this->twig->addExtension($extension);
    }

    public function addGlobal($name, $value)
    {
        $this->twig->addGlobal($name, $value);
    }
} 
