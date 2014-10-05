<?php

namespace Leadaki\Frontend\Controller;

class PromotionController extends AbstractController
{
    public function indexAction()
    {
        return $this->render('promotions.html.twig');
    }

    public function detailAction($slug)
    {
        return $this->render('promotion_detail.html.twig', array(
            'slug' => $slug,
        ));
    }
} 
