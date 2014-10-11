<?php

namespace Leadaki\Frontend\Controller;

use Leadaki\Frontend\Router\Response;

/**
 * Class DefaultController
 *
 * @author Jesús Urrutia <me@jesusurrutia.com>
 *
 * @package Leadaki\Frontend\Controller
 */
class DefaultController extends AbstractController
{
    public function indexAction()
    {
        return new Response(
            $this->template->render('index.html.twig')
        );
    }
} 
