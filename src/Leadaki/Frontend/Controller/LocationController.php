<?php

namespace Leadaki\Frontend\Controller;

/**
 * Class LocationController
 *
 * @package Leadaki\Frontend\Controller
 */
class LocationController extends AbstractController
{
    public function indexAction()
    {
        return $this->render('ubicacion.html.twig');
    }
} 
