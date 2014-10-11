<?php

namespace Leadaki\Frontend\Application;

use Leadaki\Frontend\Router\Response;
use Leadaki\Frontend\Router\RouterServiceInterface;
use Leadaki\Frontend\Template\TemplateServiceInterface;
use Leadaki\Frontend\Model\Site;

/**
 * Class Application
 *
 * @author Jesús Urrutia <me@jesusurrutia.com>
 *
 * @package Leadaki\Frontend\Application
 */
class Application implements ApplicationInterface
{
    /** @var RouterServiceInterface */
    private $router;

    /** @var TemplateServiceInterface */
    private $template;

    /** @var array */
    private $config;

    /** @var Site */
    private $site;

    public function __construct(
        RouterServiceInterface $router,
        TemplateServiceInterface $template,
        $config,
        Site $site
    )
    {
        $this->template = $template;
        $this->router = $router;
        $this->config = $config;
        $this->site = $site;
    }

    public function run()
    {
        $match = $this->router->match();

        if (empty($match)) {
            echo "\nNot Found\n";
            exit;
        }

        $defaults = $match->getDefaults();
        $controllerName = '\\Leadaki\\Frontend\\Controller\\' . $defaults['_controller'] . 'Controller';
        $methodName = $defaults['_action'] . 'Action';

        $controller = new $controllerName($this->template, $this->config, $this->site);

        /** @var Response $response */
        $response = call_user_func_array(array($controller, $methodName), $match->getParameters());

        echo $response->getBody();
    }
} 
