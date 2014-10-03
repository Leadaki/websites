<?php

namespace Leadaki\Frontend\Controller;

/**
 * Class AboutUsController
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
