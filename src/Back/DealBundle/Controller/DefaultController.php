<?php

namespace Back\DealBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BackDealBundle:Default:index.html.twig', array('name' => $name));
    }
}
