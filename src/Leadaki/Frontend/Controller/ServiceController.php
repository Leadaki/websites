<?php

namespace Leadaki\Frontend\Controller;

/**
 * Class ServiceController
 *
 * @author Jesús Urrutia <me@jesusurrutia.com>
 *
 * @package Leadaki\Frontend\Controller
 */
class ServiceController extends AbstractController
{
    public function indexAction()
    {
        return $this->render('items.html.twig', array(
            'item_data' => array(
                'title' => 'Servicios',
                'name' => 'service',
                'collection' => 'services',
            ),
        ));
    }

    public function detailAction($slug)
    {
        return $this->render('item_detail.html.twig', array(
            'slug' => $slug,
            'item_data' => array(
                'title' => 'Servicio',
                'title_collection' => 'Servicios',
                'name' => 'service',
                'collection' => 'services',
            ),
        ));
    }
} 
