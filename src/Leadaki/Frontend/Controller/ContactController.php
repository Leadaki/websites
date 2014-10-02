<?php

namespace Leadaki\Frontend\Controller;

/**
 * Class ContactController
 *
 * @package Leadaki\Frontend\Controller
 */
class ContactController extends AbstractController
{
    public function indexAction()
    {
        return $this->render('contactanos.html.twig');
    }
} 
