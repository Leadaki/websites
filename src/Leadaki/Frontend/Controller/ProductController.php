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
        return $this->render('products.html.twig');
    }

    public function detailAction($slug)
    {
        return $this->render('product_detail.html.twig');
    }
} 
