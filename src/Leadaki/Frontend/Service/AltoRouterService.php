<?php

namespace Leadaki\Frontend\Service;

use Leadaki\Frontend\Router\RouterMatch;
use Leadaki\Frontend\Router\RouterServiceInterface;

/**
 * Class AltoRouterService
 *
 * @author Jesús Urrutia <me@jesusurrutia.com>
 *
 * @package Leadaki\Frontend\Service
 */
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
            'promotions'
        );

        $this->router->map(
            'GET',
            '/promociones/[:slug]',
            array('_controller' => 'Promotion', '_action' => 'detail'),
            'promotion_detail'
        );

        $this->router->map(
            'GET',
            '/productos',
            array('_controller' => 'Product', '_action' => 'index'),
            'products'
        );

        $this->router->map(
            'GET',
            '/productos/[:slug]',
            array('_controller' => 'Product', '_action' => 'detail'),
            'product_detail'
        );

        $this->router->map(
            'GET',
            '/servicios',
            array('_controller' => 'Service', '_action' => 'index'),
            'services'
        );

        $this->router->map(
            'GET',
            '/servicios/[:slug]',
            array('_controller' => 'Service', '_action' => 'detail'),
            'service_detail'
        );

        $this->router->map(
            'GET',
            '/quienes-somos',
            array('_controller' => 'AboutUs', '_action' => 'index'),
            'about_us'
        );

        $this->router->map(
            'GET',
            '/ubicacion',
            array('_controller' => 'Location', '_action' => 'index'),
            'location'
        );

        $this->router->map(
            'GET',
            '/contactanos',
            array('_controller' => 'Contact', '_action' => 'index'),
            'contact'
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
