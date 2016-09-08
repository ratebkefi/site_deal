<?php

namespace Back\DealBundle\Controller;

use Back\DealBundle\Form\DealFilterDateType;
use DCS\RatingBundle\Entity\Vote;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\DealBundle\Entity\Deal;
use Back\DealBundle\Entity\Dealhistory;
use Back\DealBundle\Form\DealType;
use Back\DashBundle\Common\Tools;
use Back\DealBundle\Form\DealChangeType;
Use Main\FrontBundle\Form\CommentType;
use Back\DashBundle\Constant;
use Back\DashBundle\Entity\Notification;

class DealController extends Controller
{
    public function changeredactorAction(Deal $deal){
        $em = $this->getDoctrine()->getManager();
        $request=$this->get('request');
        $form = $this->createForm(new DealChangeType(), $deal);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            $em->persist($deal);
            $em->flush();
            return $this->redirect($this->generateUrl('back_deal'));
        }
        return $this->render('BackDealBundle:Deal:change.html.twig', array('form' => $form->createView(), 'deal' => $deal));
    }

    public function dealajxAction(Request $request)
    {
        $query = $request->query->get('query');
        if (strlen($query) < 3) {
            $response = new Response(json_encode(null));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
        $deals = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->getDealfilter($query);
        $tab = array();
        foreach ($deals as $value) {

            $tab[] = array(
                "id" => $value->getId(),
                "full_name" => $value->getTitle()
            );

        }
        $response = new Response(json_encode($tab));
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }

    public function indexAction(Request $request)
    {
        $form = $this->createForm(new DealFilterDateType(array("em" => $this->getDoctrine()->getRepository("BackPlanningBundle:Category"))));
        $data = $request->query->get('back_dealbundle_filterdeal');
        $data = Tools::dropNull($data);

        $form->bind($request);
        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();

        if($roles[0]=="ROLE_SUPER_ADMIN")
        {
            $breadcrumbsLible ="Service rédaction";
        }
        else
        {
            $breadcrumbsLible ="Deals";
        }
        if($roles[0]=="REDACTEUR" or $roles[0]=="CHEFRED")
        {
            $deal = $this->getDoctrine()
                ->getRepository('BackDealBundle:Deal')
                ->getListDealRedacteur($data);
        }
        else
            $deal = $this->getDoctrine()
                ->getRepository('BackDealBundle:Deal')
                ->getListDeal($data);
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($breadcrumbsLible, $this->generateUrl("back_deal"), array());

        /*$deal = $this->getDoctrine()
            ->getRepository('BackDealBundle:Deal')
            ->findAll();*/
        //$deal = array_reverse($deal);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $deal, $request->query->get('page', 1)/* page number */, 20/* limit per page */
        );
        return $this->render('BackDealBundle:Deal:index.html.twig', array('form' => $form->createView(), 'entities' => $deal,
            'pagination' => $pagination));
    }

    public function showAction($id)
    {
        $request = $this->get('request');
        $deal = $this->getDoctrine()
            ->getRepository('BackDealBundle:Deal')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new DealType(), $deal);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('back_deal'));
        } else {
            // echo $form->getErrors();
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des deals", $this->generateUrl("back_deal"), array());
        $breadcrumbs->addItem("Détails deals", $this->generateUrl("back_deal"), array());
        return $this->render('BackDealBundle:Deal:show.html.twig', array('form' => $form->createView(), "entity" => $deal, 'id' => $id,));
    }

    public function editAction(Deal $deal, $type = null)
    {

        $request = $this->get('request');
        $data['roles']="REDACTEUR";

        $agent = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->findBy($data);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new DealType(), $deal);
        $form->handleRequest($request);
        $file = $deal->getImage1();
        $file2 = $deal->getImage2();
        $file1 = $deal->getImage3();
        $file4 = $deal->getImage4();
        $planning = $deal->getPlanning();
        //$valeurPlanning = $deal->getPlanning()->getId();

        if ($form->isValid()) {
            $deal->setRedacteur($this->get('security.context')->getToken()->getUser());
            $deal->setImage1($request->request->get('file'));
            $deal->setImage2($request->request->get('file2'));
            $deal->setImage3($request->request->get('file1'));
            $deal->setImage4($request->request->get('file4'));

            $em->flush();
            //$deal->setPlanning($valeurPlanning);
            $history=new Dealhistory();
            $history->setDeal($deal);
            $history->setType(2);
            $em->persist($history);
            $em->flush();
            if ($type == 1) {
                return $this->redirect($this->generateUrl('redactordeal_deal'));
            } else if ($type == 2) {
                return $this->redirect($this->generateUrl('redactordeal_mydeal'));
            } else {
                return $this->redirect($this->generateUrl('back_deal'));
            }
        } else {
            //echo $form->getErrors();
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des deals", $this->generateUrl("back_deal"), array());
        $breadcrumbs->addItem("Modifier deal", $this->generateUrl("back_deal"), array());
        return $this->render('BackDealBundle:Deal:edit.html.twig', array('type' => $type, 'form' => $form->createView(), "deal" => $deal, 'id' => $deal->getId(),
            'image1' => $file, 'image2' => $file2, 'image3' => $file1,'image4' => $file4, 'agent' => $agent));
    }

    public function deleteAction(Deal $deal)
    {
        if (!$deal) {
            throw $this->createNotFoundException('No Deal found');
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($deal);
        $em->flush();

        return $this->redirect($this->generateUrl('back_deal'));
    }

    public function alldealAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        // Example with parameter injected into translation "user.profile"
        $breadcrumbs->addItem("Deals planifiés", "back_partner", array());

        $request = $this->get('request');
        $planning = $this->getDoctrine()->getRepository('BackPlanningBundle:Planning')
            ->getNotnullDeal($user);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $planning, $request->query->get('page', 1)/* page number */, 10/* limit per page */
        );
        return $this->render('BackDealBundle:Deal:alldeal.html.twig', array('entities' => $planning,
            'pagination' => $pagination));
    }

    public function mydealAction()
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        // Example with parameter injected into translation "user.profile"
        $breadcrumbs->addItem("Deals Rédigés", "back_partner", array());
        $user = $this->get('security.context')->getToken()->getUser();
        $request = $this->get('request');
        $deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->findBy(array('redacteur' => $user));
        $deals = $deal;
        foreach ($deals as $key => $value) {
            if ($value->getPlanning()->getState() == 2 or $value->getPlanning()->getState() == 0 or $value->getPlanning()->getState() == 3 or $value->getPlanning()->getState() == 4) {
                unset($deal[$key]);
            }
        }
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $deal, $request->query->get('page', 1)/* page number */, 10/* limit per page */
        );
        return $this->render('BackDealBundle:Deal:mydeal.html.twig', array('entities' => $deal,
            'pagination' => $pagination));
    }

    public function ajxgetdealAction()
    {
        $request = $this->get("request");
        $id = $request->request->get('id');

        $deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->getListDealPartenaire($id);

        return $this->render('BackDealBundle:Deal:ajxgetdeal.html.twig', array('entities' => $deal,
        ));
    }

    public function couponAction()
    {
        $request = $this->get("request");

        $id = $request->query->get('id');
        $couponFacturable = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->getCouponFacturable1($id);
        $facture = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->getDeuiemeFacture($id);
        $fact = $facture[0]['nbr'];
        $leDeal  = $this->getDoctrine()
            ->getRepository('BackDealBundle:Deal')
            ->find($id);
        $PrixReference = $leDeal->getPlanning()->getDefaultannexe()->getReference();
        $nbrGratuit =  $leDeal->getPlanning()->getDefaultannexe()->getNbrGratuite();
        if ($fact >=1){
            $nbrGratuit=0;
        }
        $minPrice = 900000;
        foreach($PrixReference as $val)
        {
            if($minPrice > $val->getBigdealPrice())
                $minPrice = $val->getBigdealPrice();
        }
        return $this->render('BackDealBundle:Deal:coupon.html.twig', array('entities' => $couponFacturable,"minprice"=>$minPrice,"nbrgratuit"=>$nbrGratuit, 'facture' => $fact,
        ));
    }

    public function totalAction()
    {
        $request = $this->get("request");
        $id = $request->request->get('id');
        $total = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->getTotal($id);
        return $this->render('BackDealBundle:Deal:total.html.twig', array('entities' => $total));
    }

    public function detaildealAction(Deal $deal)
    {
        return $this->render('BackDealBundle:Deal:detaildeail.html.twig', array('deal' => $deal));
    }

    public function apercuAction(Deal $deal)
    {


        $request = $this->get('request');
        $client=$this->get('security.context')->getToken()->getUser();

        $deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->find($deal->getId());
        $nbvote=$this->getDoctrine()->getRepository('BackDealBundle:Vote')->getNumberVoted($deal->getId());
        // test affichage de formulaire de commentaire
        $testfrm=false;
        if(is_object($client)){
            $command=$client->getCommand();
            foreach($command as $value){
                if($value->getDeal()->getId()==$deal->getId() && $value->getEtat()==1){
                    $testfrm=true;
                }
            }
        }
        $nbcoupon = 0;
        foreach ($deal->getCommand() as $value) {
            $nbcoupon += count($value->getCoupon());

        }
        if ($request->getMethod() == 'POST') {
            $planning = $deal->getPlanning();
            $planning->setState(2);
            $em = $this->getDoctrine()->getManager();
            $em->persist($planning);
            $em->flush();
            /*---------------------------Notification-------------------------------------------*/
            $listUserForNotif = Constant\NotifUser::getValidationDEAL();

            $libelleNotif = $client->getName()." a fini de rédiger le deal ". $deal->getTitle();
            $lient = $this->generateUrl('apercu_deal_view', array('id' => $deal->getId()));
            $icone = "icon-font";
            for($count=1;$count<=count($listUserForNotif);$count++)
            {
                $query = $this->getDoctrine()->getEntityManager()
                    ->createQuery(
                        'SELECT u FROM UserUserBundle:User u WHERE u.roles LIKE :role'
                    )->setParameter('role', '%"'.$listUserForNotif[$count].'"%');

                $listUser = $query->getResult();
                foreach($listUser as $value)
                {
                    $notification = new Notification();
                    $notification->setUser($this->getDoctrine()->getRepository("UserUserBundle:User")->find($value->getId()) );
                    $notification->setName($libelleNotif);
                    $notification->setLien($lient);
                    $notification->setIcone($icone);
                    $em->persist($notification);
                    $em->flush();
                }
                unset($listUser);
            }
            return $this->redirect($this->generateUrl('back_deal'));
        }
        return $this->render('BackDealBundle:Deal:apercu.html.twig',
            array('deal' => $deal
            ,'nbvote'=>$nbvote,
                'nbcoupon' => $nbcoupon,

                'testfrm'=>$testfrm,
        ));
    }

    public function getalldealcategorieAction(Request $request){

        $idcat=explode(',',$request->request->get('id'));
        $deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->getAllDealCategorie($idcat);
        return $this->render('BackDealBundle:Deal:selectoption.html.twig', array(
            'deal'=>$deal,
        ));
    }

    public function homeredacteurAction(){
        $user=$this->get('security.context')->getToken()->getUser();
        $deal=$this->getDoctrine()->getRepository('BackDealBundle:Deal')->findBy(array('redacteur'=>$user));
        $deals = $deal;
        foreach ($deals as $key => $value) {
            if ($value->getPlanning()->getState() == 2 or $value->getPlanning()->getState() == 0 or $value->getPlanning()->getState() == 3 or $value->getPlanning()->getState() == 4) {
                unset($deal[$key]);
            }
        }
        $mydeal= count($deal);
        $planning=$this->getDoctrine()->getRepository('BackPlanningBundle:Planning')
            ->getNotnullDeal($user);
        $alldeal=count($planning);

        return $this->render('BackDealBundle:Deal:redacteur.html.twig', array('mydeal'=>$mydeal,'alldeal'=>$alldeal));
    }
}
