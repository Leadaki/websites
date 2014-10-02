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
        return $this->render('productos.html.twig');
    }

    public function detailAction()
    {
        return $this->render('productos.html.twig');
    }
} 
