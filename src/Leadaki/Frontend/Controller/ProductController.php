<?php

namespace Leadaki\Frontend\Controller;

/**
 * Class ProductController
 *
 * @package Leadaki\Frontend\Controller
 */
class ProductController extends AbstractController
{
    public function indexAction()
    {
        return $this->render('items.html.twig', array(
            'item_data' => array(
                'title' => 'Productos',
                'name' => 'product',
                'collection' => 'products',
            ),
        ));
    }

    public function detailAction($slug)
    {
        return $this->render('item_detail.html.twig', array(
            'slug' => $slug,
            'item_data' => array(
                'title' => 'Producto',
                'title_collection' => 'Productos',
                'name' => 'product',
                'collection' => 'products',
            ),
        ));
    }
} 
