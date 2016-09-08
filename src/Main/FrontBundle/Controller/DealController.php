<?php

namespace Main\FrontBundle\Controller;
use Main\FrontBundle\Entity\GpgLog;
use Back\DashBundle\Common\Tools;
use Main\FrontBundle\Entity\Post;
use Main\FrontBundle\Form\InscriptionType;
use Back\CommandeBundle\Entity\Client;
use Back\CommandeBundle\Entity\Adress;
use Main\FrontBundle\Form\PhoneType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Back\DashBundle\Entity\BigFidHistorique;
use Back\ContractBundle\Entity\Reference;
use Back\CommandeBundle\Entity\Command;
use Back\CommandeBundle\Entity\Coupon;
use Back\PlanningBundle\Entity\Category;
use Back\DealBundle\Entity\Vote;
use Main\FrontBundle\Form\CommentType;
Use Main\FrontBundle\Form\AdressType;
use Back\CommandeBundle\Entity\Operation;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\Response;
use Back\DealBundle\Entity\Deal;
use Symfony\Component\Validator\Constraints\NotNull;
use Main\FrontBundle\Facebook\FacebookSession;
use Main\FrontBundle\Facebook\FacebookRedirectLoginHelper;
use Main\FrontBundle\Facebook\FacebookRequest;
use Main\FrontBundle\Facebook\FacebookResponse;
use Main\FrontBundle\Facebook\FacebookSDKException;
use Main\FrontBundle\Facebook\FacebookRequestException;
use Main\FrontBundle\Facebook\FacebookAuthorizationException;
use Main\FrontBundle\Facebook\GraphObject;
use Main\FrontBundle\Facebook\GraphLocation;
use Main\FrontBundle\Facebook\GraphUser;
use Main\FrontBundle\Facebook\Entities\AccessToken;
use Main\FrontBundle\Facebook\HttpClients\FacebookCurlHttpClient;
use Main\FrontBundle\Facebook\HttpClients\FacebookHttpable;
use Main\FrontBundle\Facebook\FacebookCanvasLoginHelper;

class DealController extends Controller
{

    public function indexAction($region, $categorie, $id, $name)
    {
        $request = $this->get('request');
        $client = $this->get('security.context')->getToken()->getUser();
        $deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->find($id);
		if($deal->getPlanning()->getState()!=3)
		{
			return $this->redirect($this->generateUrl('main_front_homepage'));
		}
        $em = $this->getDoctrine()->getManager();
        $session = $this->get('session');
        if (is_object($client))
            $curentUser = $client->getId();
        else
            $curentUser = null;
        /*-------------------Share facebook--------------------------------------------------------*/

        // cas de d'achat suite à un clique via facebook
        if ($request->query->get('user'))

            $session->set("user_id", $request->query->get('user'));

        $clientPatager = $session->get("user_id");

        $postId = $request->query->get('post_id');
        if ($clientPatager) {
            $poste = $this->getDoctrine()->getRepository('MainFrontBundle:Post')->findBy(array("idClient" => $clientPatager,'idDeal'=>$id));
            foreach ($poste as $value) {
                $idPost = $value->getIdPost();
            }
            if (isset($idPost)) {
                $session->set("post_id", $idPost);

            } else
                $session->set("post_id", null);
        }

        // cas de partage pour gagner de bigfid

        if ($postId) {
            $poste = $this->getDoctrine()->getRepository('MainFrontBundle:Post')->findBy(array("idPost" => $postId));
            if ($this->get('security.context')->getToken()->getUser() != "anon.") {

                if (count($poste) == 0) {
                    $newPoste = new Post();
                    $newPoste->setIdClient($client);
                    $newPoste->setIdDeal($deal);
                    $newPoste->setIdPost($postId);
                    $em->persist($newPoste);
                    $em->flush();
                }
            } else
                $session->set("post_id", null);

        }

        /*--------------------------Fin share facebook--------------------------------------------------*/
        //Tools::dump($client,true);
        // set refer link
        $currentRoute = $request->attributes->get('_route');

        $currentUrl = $this->get('router')->generate($currentRoute, array('region' => $region, 'categorie' => $categorie, 'name' => $name, 'id' => $id), true);


        $session->set("refer", $currentUrl);
        // end refer link
        $votes = $this->getDoctrine()->getRepository('BackDealBundle:Vote')->getNumberVoted($id);
        $nbvote = count($votes);
        // nbr vote > 3
        $nbvote3 = 0;
        foreach ($votes as $value) {
            if ($value->getValue() >= 3 && $value->getAct()) {
                ++$nbvote3;
            }
        }
        // calculer le nbr des coupons de ce deal
        $nbcoupon = 0;
        foreach ($deal->getCommand() as $value) {
            $nbcoupon += count($value->getCoupon());

        }
        // test affichage de formulaire de commentaire
        $testfrm = false;
        if (is_object($client)) {
            $command = $client->getCommand();
            foreach ($command as $value) {
                if ($value->getDeal()->getId() == $id && $value->getEtat() == 1) {
                    $testfrm = true;
                }
            }
        }
        $commentaire = $this->getDoctrine()->getRepository('BackDealBundle:Vote')->findBy(array('act' => true, 'rating' => $deal), array("id" => "DESC"));

        $com = $commentaire;
        $i = 0;
        $pagercomment = false;
        foreach ($com as $key => $value) {
            if ($i >= 10) {
                unset($commentaire[$key]);
                $pagercomment = true;
            }
            ++$i;
        }
        $comment = new Vote();
        $form = $this->createForm(new CommentType(), $comment);
        if ($request->getMethod() == 'POST') {
            if ($client != null) {
                $form->bind($request);
                $rate = $this->getDoctrine()->getRepository('BackDealBundle:Rating')->find($deal->getId());
                $comment->setVoter($client);
                $comment->setRating($rate);
                //Tools::dump($comment,true);
                $em->persist($comment);
                $em->flush();
                $this->get('session')->getFlashBag()->set('alert-success', 'Votre message a été envoyé, il sera affiché après modération. Merci');

                return $this->redirect($this->generateUrl('deal_detail', array("region" => $region, "categorie" => $categorie, "id" => $id, 'name' => $name)) . "#comment");
            }
        }
        // changer l'url pour l'image


        $deal->setDescription(str_replace('../../../../', "/", $deal->getDescription()));
        $deal->setDeal(str_replace('../../../../', "/", $deal->getDeal()));
        $deal->setYouLike(str_replace('../../../../', "/", $deal->getYouLike()));
        $deal->setToBeClear(str_replace('../../../../', "/", $deal->getToBeClear()));
        $deal->setBigdeallike(str_replace('../../../../', "/", $deal->getBigdeallike()));
        $deal->setStrongpoint(str_replace('../../../../', "/", $deal->getStrongpoint()));


        // test de max coupon par user
        $securityContext = $this->container->get('security.context');
        $nbcoupon = 0;
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $command = $this->getDoctrine()->getRepository('BackCommandeBundle:Command')->findBy(array('deal' => $deal, 'etat' => 1, 'client' => $client));
            foreach ($command as $key => $cmd) {
                foreach ($cmd->getCoupon() as $coup) {
                    if ($coup->getVendu() == 2 || $coup->getVendu() == 3) {
                        ++$nbcoupon;
                    }
                }
            }
        }


        return $this->render('MainFrontBundle:Deal:index.html.twig', array(
            'deal' => $deal,
            'nbvote' => $nbvote,
            'nbcoupon' => $nbcoupon,
            'pagercomment' => $pagercomment,
            'curentUser' => $curentUser,

            'nbvote3' => $nbvote3,
            'commentaire' => $commentaire,
            'form' => $form->createView(),
            'testfrm' => $testfrm
        ));
    }

    public function confirmAction(Command $command)
    {
        $coupon = $command->getCoupon();
        $price=3;
        foreach ($coupon as $value) {
            $value->getprice();
            $price=$price+$value->getprice();
        }

        $client = $this->get('security.context')->getToken()->getUser();

        return $this->render('MainFrontBundle:Deal:confirmationpal.html.twig', array(
            'client' => $client,
            'command' => $command,
            'price' => $price
        ));
    }

    public function allcommentpagerAction($id)
    {
        // liste des commentaire de meme partenaire
        $deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->find($id);
        $request = $this->get('request');
        $user = $deal->getPlanning()->getDefaultannexe()->getProtocol()->getUser();
        $alldeal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->getDealByUser($user);
        $AllComment = array();
        foreach ($alldeal as $value) {
            $rating = $this->getDoctrine()->getRepository('BackDealBundle:Vote')->findBy(array('rating' => $value->getId(), 'act' => true));
            foreach ($rating as $valcmt) {
                if ($valcmt->getAct())
                    $AllComment[$valcmt->getId()] = $valcmt;
            }
        }

        array_values($AllComment);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $AllComment,
            $request->query->get('page', 1)/*page number*/,
            8
        );
        return $this->render('MainFrontBundle:Deal:allcomment.html.twig', array(
            'deal' => $deal,
            'pagination' => $pagination,
            'AllComment' => $AllComment,

        ));
    }

    public function commentpagerAction($id, $page)
    {
        $request = $this->get('request');
        $deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->find($id);
        $commentaire = $this->getDoctrine()->getRepository('BackDealBundle:Vote')->findBy(array('act' => true, 'rating' => $deal), array("id" => "ASC"));
        $end = $page * 10;
        $star = $end - 10 + 1;
        $pagercomment = 0;
        if (count($commentaire) > 10) {

            $nbinpage = $commentaire;
            $i = 1;
            foreach ($nbinpage as $key => $value) {
                if ($i < $star) {
                    unset($commentaire[$key]);
                }
                if ($i > $end) {
                    unset($commentaire[$key]);
                    $pagercomment = 1;
                }

                ++$i;
            }
        }
        ++$page;
        return $this->render('MainFrontBundle:Deal:commentpage.html.twig', array(
            'page' => $page,
            'deal' => $deal,
            'pagercomment' => $pagercomment,
            'commentaire' => $commentaire,

        ));
    }

    public function ajxlistAction(Request $request)
    {
        $session = $this->get('session');
        // liste des 3 premier deal de cette catégorie
        $regionname = $session->get('region');
        $id = 1;

        if ($regionname != "") {

            $regions = $this->getDoctrine()->getRepository('BackPlanningBundle:Region')->findBy(array('name' => $regionname));
            foreach ($regions as $value) {
                $id = $value->getId();
            }
        }
        $price = explode(",", $request->request->get('price'));
        $pricestr = (string)$request->request->get('price');
        $catstr = $request->request->get('category');
        $category = explode(",", $request->request->get('category'));
        $cat0 = $this->getDoctrine()->getRepository('BackPlanningBundle:Category')->find($category[0]);
        $paginator = $this->get('knp_paginator');
        $deals = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->listByCotegory($cat0, $id);
        $deal = $deals;
        foreach ($deal as $key => $value) {
            if (count($value->getPlanning()->getDefaultannexe()->getReference()) == 0) {
                unset($deals[$key]);
            }
            if ($value->getImage1() == "") {
                unset($deals[$key]);
            }
        }

        //appliquer les filtre
        /****** category ******/
        if (count($category) > 1) {
            $deal = $deals;
            foreach ($deal as $key => $value) {
                if (!in_array($value->getPlanning()->getCategoryId()->getId(), $category)) {
                    unset($deals[$key]);
                }
            }
        }
        /****** price ******/
        $min = $price[0];
        $max = $price[1];
        $deal = $deals;
        foreach ($deal as $key => $value) {
            $tst = false;
            foreach ($value->getPlanning()->getDefaultannexe()->getReference() as $k => $v) {
                foreach ($price as $vp) {
                    if ($v->getBigdealPrice() >= $min && $v->getBigdealPrice() <= $max) {
                        $tst = true;
                    }
                }

            }
            if (!$tst)
                unset($deals[$key]);
        }

        $deals = array_values($deals);
        $pager = 0;
        $testpager = false;
        if (count($deals) > 4) {
            $pager = 1;
            $nbinpage = $deals;
            $i = 1;
            /*foreach ($nbinpage as $key => $value) {
                if ($i > 4) unset($deals[$key]);
                else $testpager = true;
                ++$i;
            }*/
        }


        // echo count($deals);exit;
        return $this->render('MainFrontBundle:Deal:listajx.html.twig', array(
            'deal' => $deals,
            'testpager' => $testpager,
            'pager' => $pager + 1,
            "category" => $catstr,
            "max" => $max,
            "min" => $min
        ));

    }

    public function dealpassepageAction($page, $cat)
    {
        $catid = explode(",", $cat);


        $deals = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->passedDeal();
        $deal = $deals;
        foreach ($deal as $key => $value) {
            if (count($value->getPlanning()->getDefaultannexe()->getReference()) == 0) {
                unset($deals[$key]);
            }
            if ($value->getImage1() == "") {
                unset($deals[$key]);
            }
        }
        if (is_numeric($catid[0])) {
            $deal = $deals;
            foreach ($deal as $key => $value) {
                if (!in_array($value->getPlanning()->getCategoryId()->getId(), $catid)) {
                    unset($deals[$key]);
                }
                if ($value->getImage1() == "") {
                    unset($deals[$key]);
                }
            }
        }
        $deals = array_values($deals);

        //pagination
        $end = $page * 4;
        $star = $end - 4 + 1;
        $pager = 0;
        if (count($deals) > 4) {

            $nbinpage = $deals;
            $i = 1;
            foreach ($nbinpage as $key => $value) {
                if ($i < $star) {
                    unset($deals[$key]);
                }
                if ($i > $end) {
                    unset($deals[$key]);
                    $pager = 1;
                }

                ++$i;
            }
        }
        ++$page;
        return $this->render('MainFrontBundle:Deal:passed2.html.twig', array(
            'pager' => $pager,
            'pagenext' => $page,

            'deal' => $deals,
            'catstr' => $cat

        ));

    }

    public function dealpasseAction(Request $request)
    {
        $allcategory = $this->getDoctrine()->getRepository('BackPlanningBundle:Category')->findBy(array("parent" => null));
		 $categorieSelectionner = $request->query->get('categorie');
        $deals = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->passedDealParCategorie($categorieSelectionner);
        //$deal = $deals;  
		
		 $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $deals,
			 $request->query->get('page', 1),8 );
        return $this->render('MainFrontBundle:Deal:passed.html.twig', array(
            'deal' => $deals,
            'pagination' => $pagination,
            'categorieSelectionner' => $categorieSelectionner,
            'allcategory' => $allcategory,
            'catstr' => ""
        ));
    }

    public function dealpasseajxAction($page, Request $request)
    {
        $cat = explode(",", $request->request->get('cat'));
        //Tools::dump($request->request,true);
        $deals = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->passedDeal();

        $deal = $deals;
        foreach ($deal as $key => $value) {
            if (count($value->getPlanning()->getDefaultannexe()->getReference()) == 0) {
                unset($deals[$key]);
            }
            if ($value->getImage1() == "") {
                unset($deals[$key]);
            }
        }
        if (is_numeric($cat[0])) {
            $deal = $deals;
            foreach ($deal as $key => $value) {
                if (!in_array($value->getPlanning()->getCategoryId()->getId(), $cat)) {
                    unset($deals[$key]);
                }
            }
        }
		/*
        $deals = array_values($deals);

        //pagination
        $pager = 0;
        if (count($deals) > 4) {
            $pager = 1;
            $nbinpage = $deals;
            $i = 1;
            foreach ($nbinpage as $key => $value) {
                if ($i > 4) unset($deals[$key]);
                ++$i;
            }
        }
        $page++;*/
		 $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $deals,
            $request->query->get('page', 1)/*page number*/,
            8
        );
        return $this->render('MainFrontBundle:Deal:passedajx.html.twig', array(
            'deal' => $deals,
            'pager' => $pager,
            'pagination' => $pagination,
            'catstr' => $request->request->get('cat'),
            'pagenext' => $page
        ));
    }

    public function ListpageAction($id, $page, $price)
    {
        $request = $this->get('request');
        $session = $this->get('session');
        // liste des 3 premier deal de cette catégorie

        if (is_numeric($id)) {
            $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->find($id);

            if (!$category->getNational()) {
                $regionname = $session->get('region');
                $regions = $this->getDoctrine()->getRepository('BackPlanningBundle:Region')->findBy(array('name' => $regionname));
                $id = 1;
                foreach ($regions as $value) {
                    $id = $value->getId();
                }
                $deals = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->listByCotegory($category, $id);
            } else {
                $slidedeal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->listByCotegory($category);
            }


        } else {
            $tab = explode(",", $id);
            $categorys = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy($tab);

            $category = $categorys[0];

            if (!$category->getNational()) {
                $regionname = $session->get('region');
                $regions = $this->getDoctrine()->getRepository('BackPlanningBundle:Region')->findBy(array('name' => $regionname));
                $id = 1;
                foreach ($regions as $value) {
                    $id = $value->getId();
                }
                $deals = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->listByCotegory($tab, $id);
            } else {
                $slidedeal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->listByCotegory($category);
            }

        }

        $deal = $deals;
        foreach ($deal as $key => $value) {
            if (count($value->getPlanning()->getDefaultannexe()->getReference()) == 0) {
                unset($deals[$key]);
            }
            if ($value->getImage1() == "") {
                unset($deals[$key]);
            }
        }
        $deals = array_values($deals);

        //pagination
        $end = $page * 4;
        $star = $end - 4 + 1;
        $pager = 0;
        if (count($deals) > 4) {

            $nbinpage = $deals;
            $i = 1;
            foreach ($nbinpage as $key => $value) {
                if ($i < $star) {
                    unset($deals[$key]);
                }
                if ($i > $end) {
                    unset($deals[$key]);
                    $pager = 1;
                }

                ++$i;
            }
        }
        ++$page;
        return $this->render('MainFrontBundle:Deal:listdeal2.html.twig', array(
            'pager' => $pager,
            'pagenext' => $page,
            //'category' => $category,
            "id" => $id,
            'deal' => $deals,


        ));
    }

    public function ListAction(Category $category, $name)
    {
        $request = $this->get('request');
        $session = $this->get('session');
        // liste des 3 premier deal de cette catégorie
        $regionname = $session->get('region');
		//if($regionname=="Toutes les regions")
		//$session->set('region', 'Grand tunis');
        $id = -1;
		$categorieSelectionner = $request->query->get('categorie');
        if ($regionname != "") {

            $regions = $this->getDoctrine()->getRepository('BackPlanningBundle:Region')->findBy(array('name' => $regionname),array('name' =>'DESC'));
            foreach ($regions as $value) {
                $id = $value->getId();
            }
        }


        $paginator = $this->get('knp_paginator');
        if (!$category->getNational()) {

            $deals = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->listByCotegory($category, $id);
        } else {
            $deals = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->listByCotegory($category);
        }
        $deal = $deals;
       
		
		 //appliquer les filtre
        /****** categorieSelectionner ******/

        if (count($categorieSelectionner) >= 1) {
            foreach ($deal as $key => $value) { 
                if (!in_array($value->getPlanning()->getCategoryId()->getId(), $categorieSelectionner)) {
                    unset($deals[$key]);
                }
            }
        }
        /****** price ******/
//$price = "0'1000";
$min = 0;
$max = 300;
if($request->query->get('price')) { 
	   $price = explode(",", $request->query->get('price'));
        $min = $price[0];
        $max = $price[1];
        foreach ($deal as $key => $value) {
            $tst = false;
            foreach ($value->getPlanning()->getDefaultannexe()->getReference() as $k => $v) {
                foreach ($price as $vp) {
                    if ($v->getBigdealPrice() >= $min && $v->getBigdealPrice() <= $max) {
                        $tst = true;
                    }
                }

            }
            if (!$tst)
                unset($deals[$key]);
        }
        }
        
		
		
		/*fin filtre */
		 $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $deals,
			 $request->query->get('page', 1),8 );
			 
        //$deals = array_values($deals);
        $slidedeal = array();
        foreach ($deals as $key => $value) {
            if ($value->getSlider()) {
                $slidedeal[] = $value;
            }
        }
        if (count($slidedeal) == 0) {
            if (count($deals) > 0)
                $slidedeal[] = $deals[0];
        }
        // récupération des tarifs , elle va être changer par un sidebar
        $Arrtarif = array("0" => 0);
        foreach ($deals as $value) {
            foreach ($value->getPlanning()->getDefaultannexe()->getReference() as $key => $val) {
                $Arrtarif[$val->getBigdealPrice()] = $val->getBigdealPrice();
            }
        }

        rsort($Arrtarif);
        $topprice = $Arrtarif[0];
        $rest = $topprice % 100;
        if ($rest < 50) {
            $topprice = round($topprice / 100);
            $topprice = $topprice * 100 + 50;
        } else {
            $topprice = round($Arrtarif[0] / 100) + 1;
            $topprice = $topprice * 100;
        }

        //pagination
        $pager = 0;
        if (count($deals) > 4) {
            $pager = 1;
            $nbinpage = $deals;
            $i = 1;
            foreach ($nbinpage as $key => $value) {
                if ($i > 4) unset($deals[$key]);
                ++$i;
            }
        }
        return $this->render('MainFrontBundle:Deal:listdeal.html.twig', array(
            'pager' => $pager,
            'category' => $category,
            'slider' => $slidedeal,
            'deal' => $deals,
            'pagination' => $pagination,
            'topprice' => $topprice,
            'minprice' => $min,
            'max' => $max,
            'categorieSelectionner' => $categorieSelectionner,

            'Arrtarif' => $Arrtarif,
        ));
    }

   public function jacheteAction(Deal $deal ,Reference $reference)
    {

        $securityContext = $this->container->get('security.context');
        $adress = new Adress();
            foreach ($deal->getPlanning()->getDefaultannexe()->getReference() as $item)
        {
            $referenceDeal[] = $item->getId();
        }
        if(!in_array($reference->getId(),$referenceDeal))
        {
            return $this->redirect($this->generateUrl('main_front_homepage'));

        }
        $form = $this->createForm(new AdressType(), $adress);


        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $post_id = $session->get("post_id");
        //echo $post_id; exit;
        $request = $this->get('request');
        $client = $this->get('security.context')->getToken()->getUser();




        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('identification'));
        }
		if($client->getPhone()=="")
		{
		$this->get('session')->getFlashBag()->set('alert-error', 'Aucun numéro de téléphone n\'est associé à votre compte. Merci d\'ajouter votre numéro de téléphone');
            return $this->redirect($this->generateUrl('mon_compte'));
        }
        $qantite = $request->query->get('qte');
        if (isset($qantite)) {
            $qantite = $request->query->get('qte');
        } else
            $qantite = 1;

        //$deal = $reference->getAnnexe()->getPlanning()->getDeal();
		 
		 $dealExpirer = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->findExpireDeal($deal->getId());
		if($deal->getPlanning()->getState()!=3 or $dealExpirer>0)
		{
			return $this->redirect($this->generateUrl('main_front_homepage'));
		}
        if ($request->getMethod() == 'POST') {


            $qte = $request->request->get('qte');
            $idAdr = $request->request->get('adr');
            $paiement = $request->request->get('paiement');
            $adresseId = $request->request->get('adresse');
            if ($adresseId)
                $adresse = $this->getDoctrine()->getRepository("BackCommandeBundle:Adress")->find($adresseId);
            $commande = new Command();
            if ($post_id) {
                $poste = $this->getDoctrine()->getRepository("MainFrontBundle:Post")->findBy(array("idPost" => $post_id));

                if (count($poste) > 0) {

                    if ($poste[0]->getIdDeal()->getId() == $deal->getId()) {

                        if ($poste[0]->getIdClient()->getId() != $client->getId()) {
                            $commande->setPoste($this->getDoctrine()->getRepository("MainFrontBundle:Post")->find($poste[0]->getId()));
                        }

                    }

                }

            }

            $commande->setClient($client);
            $commande->setQte($qte);
            $commande->setReference($reference);
            $commande->setDeal($deal);
            $commande->setEtat(false);
            if ($adresseId) {

                $commande->setAdresse($adresse);
            }

            $em->persist($commande);
            $em->flush();
            $livr= $request->request->get('livr');

            if($livr==1)
            {
                $adrlivr = $this->getDoctrine()->getRepository("BackCommandeBundle:Adress")->find($idAdr);
                $commande->setAdresse($adrlivr);
                $caisseTunisiaExpress = $this->getDoctrine()->getRepository('BackCommandeBundle:Caisse')->find(26);
                $commande->setEtat(2);
                $commande->setCaisse($caisseTunisiaExpress);
                $em->persist($commande);
                $em->flush();

                $price = $reference->getBigdealPrice();
                for ($j = 1; $j <= $qte; $j++) {
                    $coupon = new Coupon();
                    $coupon->setVendu(1);
                    $coupon->setPrice($price);
                    $coupon->setCommand($commande);
                    $coupon->setRecu(1);
                    $coupon->setClient($request->request->get('clientcoupon'));
                    // generate code coupon
                    $code = Tools::generatecodeCoupon($deal->getId(), $commande->getId(), $j);
                    $coupon->setCode($code);
                    $em->persist($coupon);
                    $em->flush();
                }
               /* return $this->render('MainFrontBundle:Deal:confirmationpal.html.twig', array(
                    'client' => $client
                )); */
                // envoie d'email dans le cas paiment de livraison
                /*$message = \Swift_Message::newInstance()
                    ->setSubject('Confirmation de pré-commande ' . $commande->getId())
                    ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                    ->setTo($client->getEmail())
                    ->setBody($this->renderView('MainFrontBundle:Email:confirmOrderLivr.html.twig', array("client" => $client, "commande" => $commande, "mode" => "Espèce")));
                $message->setContentType("text/html");
                $this->get('mailer')->send($message);*/

                $adressclient = $this->getDoctrine()->getRepository('BackCommandeBundle:Adress')->findByClient($client->getId());
                foreach ($adressclient as $value) {

                        $value->setStat(false);
                        $em->persist($value);
                        $em->flush();

                }
                return $this->redirect($this->generateUrl('confirm_command',array("id" => $commande->getId())));
            }
           else
        //paiement avec BIGFID
            if ($paiement == 3) {

                // génération des coupon
                $price = $reference->getBigdealPrice();
                for ($j = 1; $j <= $qte; $j++) {

                    $coupon = new Coupon();
                    $coupon->setVendu(3);
                    $coupon->setPrice($price);
                    $coupon->setCommand($commande);
                    $coupon->setRecu(1);
                    $coupon->setClient($request->request->get('clientcoupon'));
                    // generate code coupon
                    $code = Tools::generatecodeCoupon($deal->getId(), $commande->getId(), $j);
                    $coupon->setCode($code);
                    $em->persist($coupon);
                    $em->flush();
                }
                $totalCommande = $price * $qte;
                $bigfid = $this->getDoctrine()->getRepository('BackDashBundle:Parameter')->find(1);
                $val = $bigfid->getValeur() * $totalCommande;
                $totalBigFid = round($val, 0);
				$caisseBigFid = $this->getDoctrine()->getRepository('BackCommandeBundle:Caisse')->find(19);
                $caisseBigFid->setMontantEspece($caisseBigFid->getMontantEspece() + $commande->getReference()->getBigdealPrice() * $commande->getQte());
                // forcer commande payé
                $commande->setEtat(1);
				$commande->setCaisse($caisseBigFid);

                $em->persist($commande);
                $em->flush();
                // si la commande vient d'une poste facebook
                if ($commande->getPoste()) {

                    $clientQuiPartage = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->find($commande->getPoste()->getIdClient()->getId());
                    $historiqueBigFid = new BigFidHistorique();
                    $historiqueBigFid->setDcr(new \dateTime());
                    $historiqueBigFid->setMontant(20);
                    $historiqueBigFid->setOperation(1);
                    $historiqueBigFid->setMotif("Partage facebook");
                    $historiqueBigFid->setClient($clientQuiPartage);
                    $em->persist($historiqueBigFid);
                    $em->flush();
                }
                // ajouter historique BigFid

                $bigfidClient = $this->getDoctrine()->getRepository("BackDashBundle:BigFidHistorique")->findSoldeAcuisByClient1($client->getId());
                if($bigfidClient >= $totalBigFid )
                {
                    $historiqueBigFid = new BigFidHistorique();
                    $historiqueBigFid->setDcr(new \dateTime());
                    $historiqueBigFid->setMontant($totalBigFid);
                    $historiqueBigFid->setMotif("Achat Deal " . $commande->getDeal());
                    $historiqueBigFid->setClient($client);
                    $historiqueBigFid->setOperation(0);
                    $em->persist($historiqueBigFid);
                    $em->flush();
                }


                //$client->setBigFid($client->getBigFid() - $totalBigFid);
                $em->persist($client);
                $em->flush();
                //ajouter dans les operation
                $modePayement = $this->getDoctrine()
                    ->getRepository('BackCommandeBundle:PaymentMethod')
                    ->find(3);
                $operation = new Operation();
                $operation->setCommande($commande);

                $operation->setModepayement($modePayement);
                $operation->setType(1);
                $operation->setMontant($totalBigFid);
                
                $operation->setCaisse($caisseBigFid->getUser());
                $em->persist($operation);
                $em->flush();
                //Mise à jour BigFid Client
                $bigFid = $this->getDoctrine()
                    ->getRepository('BackDashBundle:BigFidHistorique')
                    ->findBy(array("client" => $client->getId())
                        ,
                        array('dcr' => 'ASC'));
						
						/*-----------SEND MAIL COMMANDE AVEC BIGFID ---------------*/
						$messageMail = \Swift_Message::newInstance()
                    ->setSubject('Confirmation de commande  ' . $commande->getId())
                    ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                    ->setTo($client->getEmail())
                    ->setBody($this->renderView('MainFrontBundle:Email:confirmOrderBigFid.html.twig', array("client" => $client, "commande" => $commande, "mode" => "BIGFid")));
                $messageMail->setContentType("text/html");
                $this->get('mailer')->send($messageMail);
                return $this->redirect($this->generateUrl('deal_validation_commande_Bigfid', array("id" => $commande->getId())));

                //deal_validation_commande_Bigfid
            } // paiement avec carte bancaire
            elseif ($paiement == 1) {
                $addresse = $this->getDoctrine()->getRepository("BackCommandeBundle:Adress")->findBy(array("client" => $commande->getClient()->getId()));
                $addresseClient = "";
                $cpClient = "";
                foreach ($addresse as $values) {
                    if ($values->getLocalite()) {
                        $addresseClient = $values->getAdress();
                        $cpClient = $values->getLocalite()->getCp();

                    }
                }
                // génération des coupon
                $price = $reference->getBigdealPrice();
                for ($j = 1; $j <= $qte; $j++) {

                    $coupon = new Coupon();
                    $coupon->setVendu(1);
                    $coupon->setPrice($price);
                    $coupon->setCommand($commande);
                    $coupon->setRecu(1);
                    $coupon->setClient($request->request->get('clientcoupon'));
                    // generate code coupon
                    $code = Tools::generatecodeCoupon($deal->getId(), $commande->getId(), $j);
                    $coupon->setCode($code);
                    $em->persist($coupon);
                    $em->flush();
                }
                 $numsite = "MAR369";
                $str = "gf_dwH63";
                $password = md5($str);

                $devise = "TND";
                $orderId = $commande->getId();

                $Amount = $commande->getReference()->getBigdealPrice() * $commande->getQte() * 1000;
                $signature = sha1($numsite . $str . $orderId . $Amount . $devise);
               /* return $this->render('MainFrontBundle:Deal:gpg.html.twig', array(
                    "commande" => $commande,
                    "signature" => $signature,
                    "addresse" => $addresseClient,
                    "cp" => $cpClient,
                    "bigfid" => 0,

                    "str" => $password,
                    "Amount" => $Amount,

                ));*/

                $userName="BIGDEAL";
                $password="big2016-06-15";
                $language="fr";
                $clientId=$client->getId();
                $description=$deal->getTitle();
                $failUrl="https://www.facebook.com/";
                $returnUrl="https://www.facebook.com/";
                $currency="788";
                $orderNumber=$commande->getId();

                return $this->render('MainFrontBundle:Deal:monetiquetunisie.html.twig', array(
                    "userName" => $userName,
                    "password" => $password,
                    "clientId" =>$clientId,
                    "language" => $language,
                    "description" => $description,
                    "failUrl" => $failUrl,
                    "returnUrl" => $returnUrl,
                    "currency" => $currency,
                    "orderNumber" => $orderNumber,
                    "amount" => $Amount,


                ));













            } // paiement avec carte bancaire et bigfid
            elseif ($paiement == 2) {
                // ajouter historique BigFid
                $soldeClientConsome = $this->getDoctrine()->getRepository("BackDashBundle:BigFidHistorique")->soldeBigFidClient($client->getId());
                $addresse = $this->getDoctrine()->getRepository("BackCommandeBundle:Adress")->findBy(array("client" => $commande->getClient()->getId()));
                $addresseClient = "";
                $cpClient = "";
                foreach ($addresse as $values) {
                    if ($values->getLocalite()) {
                        $addresseClient = $values->getAdress();
                        $cpClient = $values->getLocalite()->getCp();
                    }
                }
                // génération des coupon
                $price = $reference->getBigdealPrice();
                for ($j = 1; $j <= $qte; $j++) {
                    $coupon = new Coupon();
                    $coupon->setVendu(1);
                    $coupon->setPrice($price);
                    $coupon->setCommand($commande);
                    $coupon->setRecu(1);
                    $coupon->setClient($request->request->get('clientcoupon'));
                    // generate code coupon
                    $code = Tools::generatecodeCoupon($deal->getId(), $commande->getId(), $j);
                    $coupon->setCode($code);
                    $em->persist($coupon);
                    $em->flush();
                }
                $numsite = "MAR369";
                $str = "gf_dwH63";
                $password = md5($str);
                $devise = "TND";
                $orderId = $commande->getId();
                $Amount = ($commande->getReference()->getBigdealPrice() * $commande->getQte() - $soldeClientConsome / 20) * 1000;
                $signature = sha1($numsite . $str . $orderId . $Amount . $devise);
                return $this->render('MainFrontBundle:Deal:gpg.html.twig', array(
                    "commande" => $commande,
                    "Amount" => $Amount,
                    "bigfid" => 1,
                    "signature" => $signature,
                    "addresse" => $addresseClient,
                    "cp" => $cpClient,
                    "str" => $password,

                ));













                // envoie d'email dans le cas carte bancaire + bigFid


            } //paiement en espece
            else {

                // génération des coupon
                $price = $reference->getBigdealPrice();
                for ($j = 1; $j <= $qte; $j++) {

                    $coupon = new Coupon();
                    $coupon->setVendu(1);
                    $coupon->setPrice($price);
                    $coupon->setCommand($commande);
                    $coupon->setRecu(1);
                    $coupon->setClient($request->request->get('clientcoupon'));
                    // generate code coupon
                    $code = Tools::generatecodeCoupon($deal->getId(), $commande->getId(), $j);
                    $coupon->setCode($code);
                    $em->persist($coupon);
                    $em->flush();
                }


                // envoie d'email dans le cas paiment espéce
                $message = \Swift_Message::newInstance()
                    ->setSubject('Confirmation de pré-commande ' . $commande->getId())
                    ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                    ->setTo($client->getEmail())
                    ->setBody($this->renderView('MainFrontBundle:Email:confirmOrderPayBox.html.twig', array("client" => $client, "commande" => $commande, "mode" => "Espèce")));
                $message->setContentType("text/html");
                $this->get('mailer')->send($message);

            }

            return $this->redirect($this->generateUrl('deal_validation_commande', array("id" => $commande->getId())));
        }
        $listeCaisse = $this->getDoctrine()->getRepository("BackCommandeBundle:Caisse")->findBy(array("afficher"=>1));
        $data = '<?xml version="1.0" encoding="utf-8"?><markers>';
        foreach ($listeCaisse as $value) {
            if ($value->getLatitude() and $value->getLongitude())
                $data .= '<marker name="' . $value->getLibelle() . '" lat="' . $value->getLatitude() . '" lng="' . $value->getLongitude() . '" address="' . $value->getAdresse() . '" phone="' . $value->getTel() . '" hours1="' . $value->getHoraire() . '" />';
        }
        $data .= '</markers>';
        $gouvernorat = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->findBy(array("parent" => null));
       $formphone = $this->createForm(new PhoneType());

        return $this->render('MainFrontBundle:Deal:jachete.html.twig', array(
            'client' => $client,
            'reference' => $reference,
            'deal' => $deal,
            'qte' => $qantite,
            'data' => $data,
            'form' => $form->createView() ,
            'formphone' => $formphone->createView() ,
            'gouvernorat' => $gouvernorat
        ));
    }

   public function payboxAction()
    {
        $listeCaisse = $this->getDoctrine()->getRepository("BackCommandeBundle:Caisse")->findBy(array("afficher"=>1));
        $data = '<?xml version="1.0" encoding="utf-8"?><markers>';
        foreach ($listeCaisse as $value) {
            if ($value->getLatitude() and $value->getLongitude())
                $data .= '<marker name="' . $value->getLibelle() . '" lat="' . $value->getLatitude() . '" lng="' . $value->getLongitude() . '" address="' . $value->getAdresse() . '" phone="' . $value->getTel() . '" hours1="' . $value->getHoraire() . '" />';
        }
        $data .= '</markers>';

        return $this->render('MainFrontBundle:Deal:paybox.html.twig' , array(
            'data' => $data,
        ));
    }


    public function ajouterAdressAction($ref)
    {
        $securityContext = $this->container->get('security.context');

        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('identification'));
        }
        $request = $this->get('request');
        $client = $this->get('security.context')->getToken()->getUser();
        $adress = new Adress();
        $form = $this->createForm(new AdressType(), $adress);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                //Tools::dump($request->request,true);
                $em = $this->getDoctrine()->getManager();
                $adress->setClient($client);
                $localite = $em->getRepository('BackCommandeBundle:Localite')->find($request->request->get('ville'));

                $adress->setLocalite($localite);
                $adress->setStat(false);
                $em->persist($adress);

                $em->flush();
                return $this->redirect($this->generateUrl('jachetelist', array("id" => $ref)));
            }
        }
    }

    public function ajouterAdresslivraisonAction($ref)
    {

        $securityContext = $this->container->get('security.context');

        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('identification'));
        }

        $request = $this->get('request');
        $dealid=$request->query->get('deal');
        $qte=$request->query->get('qte');
        $client = $this->get('security.context')->getToken()->getUser();
        $adress = new Adress();
        $form = $this->createForm(new AdressType(), $adress);

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {

                //Tools::dump($request->request,true);
                $em = $this->getDoctrine()->getManager();
                $adress->setClient($client);
                $localite = $em->getRepository('BackCommandeBundle:Localite')->find($request->request->get('ville'));
                $adress->setLocalite($localite);
                $adress->setStat(false);
                $em->persist($adress);


                $em->flush();

                return $this->redirect($this->generateUrl('jachetelist', array("deal" => $dealid,"id" => $ref)).'?qte='.$qte.'&tabtag=1');
            }
        }
    }

    public function add_adress_livraisonAction($ref)
    {
        $securityContext = $this->container->get('security.context');

        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('identification'));
        }
        $request = $this->get('request');
        $dealid=$request->query->get('deal');
        $client = $this->get('security.context')->getToken()->getUser();
        $adress = new Adress();
        $form = $this->createForm(new AdressType(), $adress);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                //Tools::dump($request->request,true);
                $em = $this->getDoctrine()->getManager();
                $adress->setClient($client);
                $localite = $em->getRepository('BackCommandeBundle:Localite')->find($request->request->get('ville'));

                $adress->setLocalite($localite);
                $em->persist($adress);

                $em->flush();
                return $this->redirect($this->generateUrl('jachetelist', array("deal" => $dealid,"id" => $ref)));
            }
        }
    }

    public function ajouterPhoneAction($ref)
    {
        $securityContext = $this->container->get('security.context');
        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('identification'));
        }
        $client = $this->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new PhoneType());
        $request = $this->get('request');
        $qte=$request->query->get('qte');
        $dealid=$request->query->get('deal');
        $phone=$request->request->get('main_frontbundle_adress')['phone'];
        if ($request->getMethod() == 'POST') {

                //Tools::dump($request->request,true);
                $em = $this->getDoctrine()->getManager();
                $client->setPhone($phone);
                $em->persist($client);
                $em->flush();

            return $this->redirect($this->generateUrl('jachetelist', array("deal" => $dealid,"id" => $ref)).'?qte='.$qte.'&tabtag=1');

        }
    }

    public function confirmationBigfidAction($id)
    {
        $client = $this->get('security.context')->getToken()->getUser();
        if($client)
        {
            $commande = $this->getDoctrine()->getRepository('BackCommandeBundle:Command')->find($id);
            $currentUser = $commande->getClient()->getId();
            if($currentUser == $client->getId())
            {
                return $this->render('MainFrontBundle:Deal:confirmationBigfid.html.twig', array("id" => $id, "commande" => $commande));
            }
            else
            {
                return $this->redirect($this->generateUrl('main_front_homepage'));
            }

        }
        else
        {
            return $this->redirect($this->generateUrl('main_front_homepage'));

        }

    }

    public function confirmationGpgAction()
    {
        $client = $this->get('security.context')->getToken()->getUser()->getId();
        if($client)
        {

            $commande = $this->getDoctrine()->getRepository('BackCommandeBundle:Command')->findBy(array("client" => $client), array('id' => 'ASC'));
            $currentUser = $commande[0]->getClient()->getId();
            if($currentUser == $client)
            {


            foreach ($commande as $value) {
                $id = $value->getId();
            }

            if ($id) {
                $lastCommande = $this->getDoctrine()->getRepository('BackCommandeBundle:Command')->find($id);
            } else {
                $lastCommande = array();
            }
            return $this->render('MainFrontBundle:Deal:confirmationgpg.html.twig', array("id" => $id, "commande" => $lastCommande));

            }
            else
            {
                return $this->redirect($this->generateUrl('main_front_homepage'));

            }
        }
        else
        {
            return $this->redirect($this->generateUrl('main_front_homepage'));

        }

    }

    public function confirmationAction($id)
    {
	        $securityContext = $this->container->get('security.context');

	if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('identification'));
        }
        $client = $this->get('security.context')->getToken()->getUser();
        if($client)
        {
            $commande = $this->getDoctrine()->getRepository('BackCommandeBundle:Command')->find($id);
            $currentUser = $commande->getClient()->getId();
            if($currentUser == $client->getId())
            {
                return $this->render('MainFrontBundle:Deal:confirmation.html.twig', array("id" => $id, "commande" => $commande));
            }
         else
         {
             return $this->redirect($this->generateUrl('main_front_homepage'));
         }

        }
        else
        {
            return $this->redirect($this->generateUrl('main_front_homepage'));

        }

    }

    public function reglePartageFacebook($idClient)
    {
        $em = $this->getDoctrine()->getManager();
        $tauxBigFid = 20;
        //insertion 20big pour historique de ce client
        $historique = new BigFidHistorique();
        $historique->setMontant($tauxBigFid);
        $historique->setDcr(new \DateTime());
        $historique->setMotif("Bonus partage facebook");
        $historique->setClient($idClient);
        $em->persist($historique);
        $em->flush();
    }

    public function dealajxtopAction(Request $request)
    {
        /**
         * c'est le retour ajax de formulaire en haut de la page de site "que cherchez vous"
         */
        $query = $request->query->get('query');
        if (strlen($query) < 3) {
            $response = new Response(json_encode(null));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
        $deals = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->getDealNow($query);
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

    public function ajxdeallinkAction()
    {
        $request = $this->get('request');
 
        $id = $request->request->get('id');
        $deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->find($id);
        return $this->render('MainFrontBundle:Deal:linkdeal.html.twig', array("deal" => $deal));
    }

    public function regionAction($id)
    {
        if($id!=0)
        {
            $region = $this->getDoctrine()->getRepository('BackPlanningBundle:Region')->find($id);
            $deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->listByRegion($region);
        }
        else
        {
            $region = "";
            $deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->listByTousRegion();
        }
        $deals = $deal;
        $request = $this->get('request');
        foreach ($deals as $key => $value) {
            if (count($value->getPlanning()->getDefaultannexe()->getReference()) == 0) {
                unset($deal[$key]);
            }
            if ($value->getImage1() == "") {
                unset($deal[$key]);
            }
        }
        $deal = array_values($deal);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $deal,
            $request->query->get('page', 1)/*page number*/,
            8/*limit per page*/
        );
        return $this->render('MainFrontBundle:Deal:listregion.html.twig', array(
            'region' => $region,
            'deal' => $deals,
            'pagination' => $pagination,
        ));
        
    }

	public function dealparregionAction($id)
	{
		
			$region = $this->getDoctrine()->getRepository('BackPlanningBundle:Region')->find($id);
			$deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->listByRegion($region);
			$deals = $deal;
        $request = $this->get('request');
		
        foreach ($deals as $key => $value) {
            if (count($value->getPlanning()->getDefaultannexe()->getReference()) == 0) {
                unset($deal[$key]);
            }
            if ($value->getImage1() == "") {
                unset($deal[$key]);
            }
        }
        $deal = array_values($deal);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $deal,
            $request->query->get('page', 1)/*page number*/,
            30/*limit per page*/
        );
        return $this->render('MainFrontBundle:Deal:dealparregion.html.twig', array(
            'region' => $region,
            'deal' => $deals,
            'pagination' => $pagination,
        ));
	}
    public function annulationAction()
    {
        return $this->render('MainFrontBundle:Deal:annulation.html.twig', array());

    }

    public function regleAchatEnLigne($idClient, $prixDeal)
    {
        $em = $this->getDoctrine()->getManager();

        //si regle active et n'est pas expiré

        $nombre = 1;
        if ($nombre > 0) {
            $BigFid = $this->getDoctrine()->getRepository('BackDashBundle:Parameter')->find(1);
            $valeurBigFid = $BigFid->getValeur();
            //recuperer Prix deal
            //$prixDeal = $commande->getReference()->getBigdealPrice();
            $tauxBigFid = round($prixDeal * $valeurBigFid * 0.02);
            //insertion 5% prix deal au client qui acheter le deal

            $client = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->find($idClient);
            $client->setBigFid($tauxBigFid);
            $em->persist($client);
            $em->flush();
            //insertion 5% pour historique de ce client
            $historique = new BigFidHistorique();
            $historique->setMontant($tauxBigFid);
            $historique->setDcr(new \DateTime());
            $historique->setMotif("Bonus achat avec carte bancaire");
            $historique->setOperation(1);
            $historique->setClient($client);
            $em->persist($historique);
            $em->flush();

        }
    }

    public function notificationAction()
    {

        $em = $this->getDoctrine()->getManager();
        $idCommande = $_POST['PAYID'] ;
        $ipClient = $_SERVER['REMOTE_ADDR'];

        $password = "gf_dwH63";

        $statusTransaction = $_POST['TransStatus']  ;

        $signatur = sha1($statusTransaction . $idCommande . $password);

        $Signature = $_POST['Signature'] ;

        $dataLog = json_encode(array(
            "get" => $_GET,
            "post" => $_POST,
        ));
        $bigFid = $_POST['merchandSession'] ;

        //ajouter log dans un fichier txt
        $logGpg = new GpgLog();
        $logGpg->setDatelog(new \dateTime());
        $logGpg->setData($dataLog."-" .$bigFid);
        $logGpg->setIdCommande($idCommande);
        $logGpg->setEtatPayement($statusTransaction);
        $logGpg->setIp($ipClient);
        $em->persist($logGpg);
        $em->flush();
        $fp = fopen('log.txt', 'a+');
        fwrite($fp, date('Y-m-d H:m:s') . ' -- ' . $idCommande . ' -- ' . $statusTransaction . ' -- ' . $ipClient . ' -- ' . $dataLog . "\n");
        fclose($fp);
        $montant =   $_POST['TotalAmount']/1000;
        $commande = $this->getDoctrine()->getRepository('BackCommandeBundle:Command')->find($idCommande);
        $listCoupon = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->findBy(array("command" => $idCommande));
        $idDeal = $commande->getDeal()->getId();

        $nombreDeCouponPourValiderDeal = $commande->getReference()->getAnnexe()->getMinCoupon();
        // le retour gpg (l'etat de payement)
        // le cas de pending
        if (($statusTransaction == "01") && ($signatur == $Signature)) {
            foreach ($listCoupon as $value) {
                $coupon = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->find($value->getId());
                $coupon->setVendu(1);
                $em->persist($coupon);
                $em->flush();
            }


        } // le cas de Unpaid
        else if (($statusTransaction == "05") && ($signatur == $Signature)) {
            foreach ($listCoupon as $value) {
                $coupon = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->find($value->getId());
                $coupon->setVendu(6);
                $em->persist($coupon);
                $em->flush();
            }


//send mail au client
            $message = \Swift_Message::newInstance()
                ->setSubject('Commande sur BIGDeal non aboutie')
                ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                ->setTo($commande->getClient()->getEmail())
                ->setBody($this->renderView('MainFrontBundle:Email:cancelOrder.html.twig', array("client" => $commande->getClient(), "commande" => $commande)));
            $message->setContentType("text/html");
            $this->get('mailer')->send($message);

        } // le cas de Paid

        else if (($statusTransaction == "00") && ($signatur == $Signature)) {
            $caisse = $this->getDoctrine()->getRepository('BackCommandeBundle:Caisse')->find(14);

            $commande->setEtat(1);
            $commande->setCaisse($caisse);
            $em->persist($commande);
            $em->flush();
            $caisse->setDateUpdate(new \DateTime());
            $caisse->setMontantEspece($caisse->getMontantEspece() + $commande->getReference()->getBigdealPrice() * $commande->getQte());
            $em->persist($caisse);
            $em->flush();

            $modePayement = $this->getDoctrine()
                ->getRepository('BackCommandeBundle:PaymentMethod')
                ->find(4);
            $operation = new Operation();
            $operation->setCommande($commande);
            $operation->setModepayement($modePayement);
            $operation->setType(1);
            $operation->setNumCheque(Null);
            $operation->setTitulaire(Null);
            $operation->setMontant($commande->getReference()->getBigdealPrice() * $commande->getQte());
            $operation->setCaisse($caisse->getUser());
            // $operation->setDcr(new \DateTime());
            $em->persist($operation);
            $em->flush();

            foreach ($listCoupon as $value) {
                $coupon = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->find($value->getId());
                $coupon->setVendu(2);
                $em->persist($coupon);
                $em->flush();
            }
            $nombreAcheteur = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->findNombreAcheteur($idDeal);
            // en cas de paiement enligne + bigfid
            if ($bigFid == 1) {
                // consommation des points bigfids

                $bigfidClient = $this->getDoctrine()->getRepository("BackDashBundle:BigFidHistorique")->findSoldeAcuisByClient($commande->getClient()->getId());

                $historiqueBigFid = new BigFidHistorique();
                $historiqueBigFid->setDcr(new \dateTime());
                $historiqueBigFid->setMontant($bigfidClient);
                $historiqueBigFid->setMotif("Achat Deal " . $commande->getDeal());
                $historiqueBigFid->setClient($commande->getClient());
                $historiqueBigFid->setOperation(0);
                $em->persist($historiqueBigFid);
                $em->flush();


            }
            // si la commande vient d'une poste facebook
            if ($commande->getPoste()) {

                $clientQuiPartage = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->find($commande->getPoste()->getIdClient()->getId());
                $historiqueBigFid = new BigFidHistorique();
                $historiqueBigFid->setDcr(new \dateTime());
                $historiqueBigFid->setMontant(20);
                $historiqueBigFid->setOperation(1);
                $historiqueBigFid->setMotif("Partage facebook");
                $historiqueBigFid->setClient($clientQuiPartage);
                $em->persist($historiqueBigFid);
                $em->flush();
            }

            self::regleAchatEnLigne($commande->getClient()->getId(), $montant);

            // envoi des email en cas de deal valider
            if ($nombreAcheteur == $nombreDeCouponPourValiderDeal) {
                $lesCoupons = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->listCouponParDeal($idDeal);
                $Lescommande = $this->getDoctrine()->getRepository('BackCommandeBundle:Command')->listCommandeVendu($idDeal);



                foreach ($Lescommande as $value) {
                    //envoi un mail au client
                    $message = \Swift_Message::newInstance()
                        ->setSubject('Votre coupon est désormais disponible '.$value->getId())
                        ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                        ->setTo($value->getClient()->getEmail())
                        ->setBody($this->renderView('MainFrontBundle:Email:dealValider.html.twig', array("client" => $value->getClient(), "commande" => $value)));
                    $message->setContentType("text/html");
                    $this->get('mailer')->send($message);
                }
            }
            //envoie les coupon au client

            if ($nombreAcheteur >= $nombreDeCouponPourValiderDeal) {
                $lesCoupons = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->listCouponParDeal($idDeal);
                $Lescommande = $this->getDoctrine()->getRepository('BackCommandeBundle:Command')->listCommandeVendu($idDeal);

                //metre les coupon Délivré
                foreach ($lesCoupons as $value) {
                    $coupon = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->find($value->getId());
                    $coupon->setVendu(3);
                    $em->persist($coupon);
                    $em->flush();
                }

                foreach ($Lescommande as $value) {
                    //envoi un mail au client
                    $message = \Swift_Message::newInstance()
                        ->setSubject('Confirmation de commande '.$value->getId())
                        ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                        ->setTo($value->getClient()->getEmail())
                        ->setBody($this->renderView('MainFrontBundle:Email:confirmOrder.html.twig', array("client" => $value->getClient(), "commande" => $value, "mode" => "Carte bancaire via GPG")));
                    $message->setContentType("text/html");
                    $this->get('mailer')->send($message);
                }
            }


        } // le cas de Cancelled

        else if (($statusTransaction == "06") && ($signatur == $Signature)) {
//&& ($signatur == $Signature)
            $commande->setEtat(3);
            $em->persist($commande);
            $em->flush();
            foreach ($listCoupon as $value) {
                $coupon = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->find($value->getId());
                $coupon->setVendu(6);
                $em->persist($coupon);
                $em->flush();
            }
            //send mail au client
            $message = \Swift_Message::newInstance()
                ->setSubject('Commande sur BIGDeal non aboutie')
                ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                ->setTo($commande->getClient()->getEmail())
                ->setBody($this->renderView('MainFrontBundle:Email:cancelOrder.html.twig', array("client" => $commande->getClient(), "commande" => $commande)));
            $message->setContentType("text/html");
            $this->get('mailer')->send($message);


        }

    }
}
