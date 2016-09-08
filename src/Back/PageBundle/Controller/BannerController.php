<?php

namespace Back\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\PageBundle\Entity\Banner;
use Back\PageBundle\Form\BannerType;
use Back\DashBundle\Common\Tools;

class BannerController extends Controller
{
    public function indexAction()
    {
        $request = $this->get('request');
        $banner = $this->getDoctrine()->getRepository('BackPageBundle:Banner')->findBy(array(),array('id'=>'DESC'));
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $banner,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Bannières publicitaires", $this->generateUrl("back_banner_homepage"), array());
        return $this->render('BackPageBundle:Banner:index.html.twig', array(
            'entities' => $banner,
            'pagination' => $pagination
        ));
    }

    public function addAction()
    {
        $page = new Banner();
        $form = $this->createForm(new BannerType(), $page);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->bind($request);
            if ($form->isValid()) {
                //Tools::dump($request->request,true);
                $file=$request->request->get('file');
                $page->setMedia($file);
                $em = $this->getDoctrine()->getManager();
                $em->persist($page);
                $em->flush();
                return $this->redirect($this->generateUrl('back_banner_homepage'));
            } else {
                //echo $form->getErrors();
            }
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Bannières publicitaires", $this->generateUrl("back_banner_homepage"), array());
        $breadcrumbs->addItem("Ajouter une bannière", $this->generateUrl("back_page_homepage"), array());
        return $this->render('BackPageBundle:Banner:edit.html.twig', array('form' => $form->createView(), "page" => $page));
    }
    public function updateAction(Banner $banner){
        $request = $this->get('request');


        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new BannerType(), $banner);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $file=$request->request->get('file');
            $banner->setMedia($file);
            $em->flush();

            return $this->redirect($this->generateUrl('back_banner_homepage'));
        } else {
            // echo $form->getErrors();
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Bannières publicitaires", $this->generateUrl("back_banner_homepage"), array());
        $breadcrumbs->addItem("Modifier une bannière", $this->generateUrl("back_banner_homepage"), array());
        return $this->render('BackPageBundle:Banner:edit.html.twig', array('form' => $form->createView(),"page"=>$banner));
    }
    public function deleteAction(Banner $banner){
        $em = $this->getDoctrine()->getManager();

        if (!$banner) {
            throw new NotFoundHttpException("Banniere non trouvée");
        }
        $em->remove($banner);
        $em->flush();
        return $this->redirect($this->generateUrl('back_banner_homepage'));
    }
}
