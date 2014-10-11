<?php

namespace Leadaki\Frontend\Controller;

/**
 * Class PromotionController
 *
 * @author Jesús Urrutia <me@jesusurrutia.com>
 *
 * @package Leadaki\Frontend\Controller
 */
class PromotionController extends AbstractController
{
    public function indexAction()
    {
        return $this->render('items.html.twig', array(
            'item_data' => array(
                'title' => 'Promociones',
                'name' => 'promotion',
                'collection' => 'promotions',
            ),
        ));
    }

    public function detailAction($slug)
    {
        return $this->render('item_detail.html.twig', array(
            'slug' => $slug,
            'item_data' => array(
                'title' => 'Promocion',
                'title_collection' => 'Promociones',
                'name' => 'promotion',
                'collection' => 'promotions',
            ),
        ));
    }
} 
