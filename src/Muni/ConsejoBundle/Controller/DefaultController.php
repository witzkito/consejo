<?php

namespace Muni\ConsejoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ConsejoBundle:Default:index.html.twig', array('name' => $name));
    }
}
