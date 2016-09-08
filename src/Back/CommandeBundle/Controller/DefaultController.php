<?php

namespace Back\CommandeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BackCommandeBundle:Default:index.html.twig', array('name' => $name));
    }
}
