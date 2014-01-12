<?php

namespace Acme\Bundle\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('KomodorBookBundle:Default:index.html.twig', array('name' => $name));
    }
}
