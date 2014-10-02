<?php

namespace Leadaki\Frontend\Controller;

use Leadaki\Frontend\Router\Response;

class DefaultController extends AbstractController
{
    public function indexAction()
    {
        return new Response(
            $this->template->render('index.html.twig')
        );
    }
} 
