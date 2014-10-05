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
        return $this->render('services.html.twig');
    }

    public function detailAction($slug)
    {
        return $this->render('service_detail.html.twig', array(
            'slug' => $slug
        ));
    }
} 
