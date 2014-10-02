<?php

namespace Leadaki\Frontend\Service;

use Leadaki\Frontend\Router\RouterMatch;
use Leadaki\Frontend\Router\RouterServiceInterface;

class AltoRouterService implements RouterServiceInterface
{
    /** @var \AltoRouter */
    private $router;

    private $config;

    public function __construct(array $options = array())
    {
        $this->router = new \AltoRouter();

        $defaults = array(
            'base_path' => '/',
        );

        $this->config = array_merge($defaults, $options);

        $this->make();
    }

    private function make()
    {
        $this->router->setBasePath($this->config['base_path']);

        $this->router->map(
            'GET',
            '/',
            array('_controller' => 'Default', '_action' => 'index'),
            'index'
        );

        $this->router->map(
            'GET',
            '/promociones',
            array('_controller' => 'Promotion', '_action' => 'index'),
            'promociones'
        );

        $this->router->map(
            'GET',
            '/productos',
            array('_controller' => 'Product', '_action' => 'index'),
            'productos'
        );

        $this->router->map(
            'GET',
            '/productos/[:slug]',
            array('_controller' => 'Product', '_action' => 'detail'),
            'productos_detalle'
        );

        $this->router->map(
            'GET',
            '/servicios',
            array('_controller' => 'Service', '_action' => 'index'),
            'servicios'
        );

        $this->router->map(
            'GET',
            '/quienes-somos',
            array('_controller' => 'AboutUs', '_action' => 'index'),
            'quienes_somos'
        );

        $this->router->map(
            'GET',
            '/ubicacion',
            array('_controller' => 'Location', '_action' => 'index'),
            'ubicacion'
        );

        $this->router->map(
            'GET',
            '/contactanos',
            array('_controller' => 'Contact', '_action' => 'index'),
            'contactanos'
        );
    }

    /**
     * @inheritdoc
     */
    public function generate($name, array $parameters = array())
    {
        return $this->router->generate($name, $parameters);
    }

    /**
     * @inheritdoc
     */
    public function match()
    {
        $match = $this->router->match();

        if (empty($match)) {
            return;
        }

        return new RouterMatch(
            $match['name'],
            $match['params'],
            $match['target']
        );
    }
} 
