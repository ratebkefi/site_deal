<?php

namespace Main\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PagesController extends Controller
{
    public function indexAction($name)
    {
        $pages=$this->getDoctrine()->getRepository('BackPageBundle:Pages')->findBy(array('alias'=>$name));
        if(count($pages)==0){
            return $this->redirect($this->generateUrl('main_front_homepage'));
        }
        return $this->render('MainFrontBundle:Page:index.html.twig', array(
            'page'=>$pages[0]
           ));
    }

}
