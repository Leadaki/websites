<?php

namespace Leadaki\Frontend\Controller;

/**
 * Class AboutUsController
 *
 * @author Jesús Urrutia <me@jesusurrutia.com>
 *
 * @package Leadaki\Frontend\Controller
 */
class AboutUsController extends AbstractController
{
    public function indexAction()
    {
        return $this->render('about_us.html.twig');
    }
} 
