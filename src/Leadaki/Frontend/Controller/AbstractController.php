<?php

namespace Leadaki\Frontend\Controller;
use Leadaki\Frontend\Model\Site;
use Leadaki\Frontend\Router\Response;
use Leadaki\Frontend\Router\ResponseInterface;
use Leadaki\Frontend\Template\TemplateServiceInterface;

/**
 * Class AbstractController
 *
 * @package Leadaki\Frontend\Controller
 */
abstract class AbstractController
{
    /** @var TemplateServiceInterface */
    protected $template;

    /** @var array */
    protected $config;

    /** @var Site */
    protected $site;

    /**
     * @param TemplateServiceInterface $template
     * @param array                    $config
     * @param Site                     $site
     */
    public function __construct(TemplateServiceInterface $template, array $config, Site $site)
    {
        $this->template = $template;
        $this->config = $config;
        $this->site = $site;
    }

    /**
     * @param string $name
     * @param array  $parameters
     *
     * @return Response
     */
    public function render($name, array $parameters = array())
    {
        return new Response(
            $this->template->render($name, $parameters)
        );
    }
} 
