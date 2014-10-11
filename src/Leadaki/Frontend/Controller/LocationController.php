<?php

namespace Leadaki\Frontend\Controller;

/**
 * Class LocationController
 *
 * @author Jesús Urrutia <me@jesusurrutia.com>
 *
 * @package Leadaki\Frontend\Controller
 */
class LocationController extends AbstractController
{
    public function indexAction()
    {
        return $this->render('location.html.twig');
    }
} 
