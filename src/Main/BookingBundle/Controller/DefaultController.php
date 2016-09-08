<?php
 
namespace Main\BookingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FrontBookingBundle:Default:index.html.twig', array('name' => $name));
    }
}
