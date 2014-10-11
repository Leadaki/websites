<?php

namespace Leadaki\Frontend\Twig;

use Leadaki\Frontend\Router\RouterServiceInterface;

/**
 * Class ApplicationTwigExtension
 *
 * @author Jesús Urrutia <me@jesusurrutia.com>
 *
 * @package Leadaki\Frontend\Twig
 */
class ApplicationTwigExtension extends \Twig_Extension
{
    /** @var array */
    private $config;

    /** @var RouterServiceInterface */
    private $routerService;

    /**
     * @param array                  $config
     * @param RouterServiceInterface $routerService
     */
    public function __construct(array $config, RouterServiceInterface $routerService)
    {
        $this->config = $config;
        $this->routerService = $routerService;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('path', array($this, 'path'), array('needs_environment' => false)),
            new \Twig_SimpleFunction('is_path', array($this, 'is_path'), array('needs_environment' => false)),
            new \Twig_SimpleFunction('asset', array($this, 'asset'), array('needs_environment' => false)),
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'leadaki_application';
    }

    /**
     * @param       $name
     * @param array $parameters
     *
     * @return string
     */
    public function path($name, array $parameters = array())
    {
        $queryString = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        return $this->routerService->generate($name, $parameters) . (empty($queryString) ? '' : '?' . $queryString);
    }

    /**
     * @param $name
     *
     * @return bool
     */
    public function is_path($name)
    {
        $route = $this->routerService->match();

        if (empty($route)) {
            return false;
        }

        return $route->getName() === $name;
    }

    /**
     * @param $path
     *
     * @return string
     */
    public function asset($path)
    {
        return $this->config['app']['base_url'] . $path;
    }
}
