<?php

namespace Leadaki\Frontend\Controller;

class PromotionController extends AbstractController
{
    public function indexAction()
    {
        return $this->render('promociones.html.twig');
    }
} 
