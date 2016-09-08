<?php

namespace Main\FrontBundle\Controller;

use Back\DashBundle\Common\Tools;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;

class DefaultController extends Controller
{


    public function indexAction()
    {
        $request = $this->get('request');
        $session= $this->get('session');
        $cookies = $request->cookies;
        //var_dump($cookies); exit;
            $paginator = $this->get('knp_paginator');

        if ($cookies->has('remeber_me')) {
            //var_dump($cookies->get('remeber_me'));
        }
        //get deal en cour
		
        $regionname=$session->get('region');
        if($regionname!="" and $regionname !='Toutes les regions'){
            $regions=$this->getDoctrine()->getRepository('BackPlanningBundle:Region')->findBy(array('name'=>$regionname));
            $id=-1;
            foreach($regions as $value){
                $id=$value->getId();
            }
            $deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getHomePage($id);
        }else{
		
            $deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getHomePage();
        }

        $deals = $deal;
        foreach ($deals as $key => $value) {
            if (count($value->getPlanning()->getDefaultannexe()->getReference()) == 0) {
              //  unset($deal[$key]);
            }
            if ($value->getImage1() == "") {
             //   unset($deal[$key]);
            }
        }
        // bannière slider
        $slider = array();
        foreach ($deals as $key => $value) {
            if ($value->getSlider()) {
                $slider[] = $value;
            }
        }
        if(count($slider)==0)
        {
            if(count($deals)>0)

                $slider[] = $deals[0];
        }

        $home = array();
        $deals = $deal;
        /*$i = 0;
        foreach ($deals as $key => $value) {
            if ($i >= 4) {
                unset($deal[$key]);
            }
            ++$i;
        }*/

        // région
        $region = $this->getDoctrine()->getRepository('BackPlanningBundle:Region')->findBy(array(), array('name' => 'ASC'));

        // get deal du jour (catégorie)
        $ArrCatId = array();
        foreach ($deal as $value) {
            if ($value->getPlanning()->getCategoryId()->getParent() != null)
                $ArrCatId[$value->getPlanning()->getCategoryId()->getParent()->getId()] = $value->getPlanning()->getCategoryId()->getParent()->getId();
        }
        $category = $this->getDoctrine()->getRepository('BackPlanningBundle:Category')->findBy(array('id' => $ArrCatId));
 $pagination = $paginator->paginate(
                $deal,
                $request->query->get('page', 1)/*page number*/,
                8/*limit per page*/
            );

        return $this->render('MainFrontBundle:Default:index.html.twig', array(
            'deal' => $pagination,
            'pagination' => $pagination,
            'slider' => $slider,
            'category' => $category,
            'region' => $region));
    }

    public function headerAction()
    {
        $region = $this->getDoctrine()->getRepository('BackPlanningBundle:Region')->findBy(array(), array('name' => 'ASC'));
        $category = $this->getDoctrine()->getRepository('BackPlanningBundle:Category')->findBy(array('parent' => null));
        $Socialmedia = $this->getDoctrine()->getRepository('BackPageBundle:Socialmedia')->findBy(array(), array('ord' => 'ASC'));

        return $this->render('MainFrontBundle:Default:header.html.twig', array(
            'social' => $Socialmedia,
            'region' => $region,
            'category' => $category
        ));
    }

    public function footerAction()
    {
        $Socialmedia = $this->getDoctrine()->getRepository('BackPageBundle:Socialmedia')->findBy(array(), array('ord' => 'ASC'));
        return $this->render('MainFrontBundle:Default:footer.html.twig', array(
            'social' => $Socialmedia
        ));
    }

    public function bannerAction($type)
    {
        $session = $this->getRequest()->getSession();
        $banner = $this->getDoctrine()->getRepository("BackPageBundle:Banner")->getActivBanner($type);
        if ($session->has("banner")) {
            $tabsession = $session->get('banner');
            $tmp = $banner;
            foreach ($tmp as $key => $value) {
                if (in_array($value->getId(), $tabsession)) {
                    unset($banner[$key]);
                }
            }
            $banner = array_values($banner);
        }
        $nb = count($banner);
        if ($nb > 0) {
            $rand = rand(0, ($nb - 1));

            return $this->render('MainFrontBundle:Default:banner.html.twig', array(
                'entity' => $banner[$rand]
            ));
        } else {
            return $this->render('MainFrontBundle:Default:banner.html.twig', array(
                'entity' => null
            ));
        }
    }

    /**
     * session des id des bannière a ne pas afficher
     */
    public function hidebannerAction()
    {

        $request = $this->get('request');
        $id = $request->request->get('id');
        $session = $this->getRequest()->getSession();
        $tabsession = array();
        if ($session->has("banner")) {
            $tabsession = $session->get('banner');
        }
        $tabsession[$id] = $id;
        $session->set('banner', $tabsession);
        exit;
    }

    public function ajxregiondealAction()
    {

        $request=$this->get('request');
        $session=$this->get("session");
        $name=$request->request->get('name');
        $session->set("region",$name);
        $regions=$this->getDoctrine()->getRepository('BackPlanningBundle:Region')->findBy(array('name'=>$name));
        if(count($regions)==1){
            $region=$regions[0];
            $deal=$this->getDoctrine()->getRepository("BackDealBundle:Deal")->listByRegion($region);
            return $this->render('MainFrontBundle:Default:listajx.html.twig', array(

                'deal' => $deal,
            ));
        }else{
            echo 'false';exit;
        }

    }

    public function ajxregiontopAction(){
        $request=$this->get('request');
        $query=$request->query->get('query');
        $region = $this->getDoctrine()->getRepository('BackPlanningBundle:Region')->getRegionTop($query);
        $tab = array();
        foreach ($region as $value) {

            $tab[] = array(
                "id" => $value->getId(),
                "full_name" => $value->getName()
            );

        }
        $response = new Response(json_encode($tab));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function ajxsetregionAction(){
        $session=$this->get('session');
        $request=$this->get('request');
        $name=$request->request->get('id');
       // Tools::dump($session);
        $region=$this->getDoctrine()->getRepository('BackPlanningBundle:Region')->findAll();
        $tab=array();
        foreach($region as $value){
            $tab[]=$value->getName();
        }

        if(in_array($name,$tab)){
            $session->set('region',$name);
        }
		else
		 $session->set('region','Toutes les regions');

        exit;

    }
}
