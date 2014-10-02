<?php

namespace Leadaki\Frontend\Controller;

/**
 * Class ServiceController
 *
 * @package Leadaki\Frontend\Controller
 */
class ServiceController extends AbstractController
{
    public function indexAction()
    {
        return $this->render('servicio.html.twig');
    }
} 
