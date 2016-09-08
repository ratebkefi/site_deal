<?php

namespace Back\PartnerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PartnerBundle:Default:index.html.twig', array('name' => $name));
    }
}
