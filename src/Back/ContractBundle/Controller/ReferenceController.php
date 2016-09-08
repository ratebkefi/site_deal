<?php

namespace Back\ContractBundle\Controller;

use Back\DashBundle\Common\Tools;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\ContractBundle\Entity\Reference;
use Back\ContractBundle\Form\ReferenceType;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Back\PlanningBundle\Entity\Planning;
use Symfony\Component\Validator\Constraints\Null;
use User\UserBundle\Entity\User;

class ReferenceController extends Controller
{


    public function indexAction($protocol_id, $annexe_id)
    {
        $request = $this->getRequest();
        $reference = $this->getDoctrine()
            ->getRepository('BackContractBundle:Reference')
            ->findBy(array('annexe' => $annexe_id));
        $annexe = $this->getDoctrine()->getRepository("BackContractBundle:Annexe")->find($annexe_id);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $reference, $request->query->get('page', 1), 10/* limit per page */
        );

        $protocol = $this->getDoctrine()
            ->getRepository('BackContractBundle:Protocol')
            ->find($protocol_id);
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("protocole : " . $protocol->getUser(), $this->generateUrl("dash_protocol_show", array("id" => $protocol_id)), array());
        $breadcrumbs->addItem("Annexe : " . $annexe->getObject(), $this->generateUrl("back_annexe_homepage", array("protocol_id" => $protocol_id)), array());
        $breadcrumbs->addItem("Gestipons des réferences", "add_protocol_manager", array());
        return $this->render('BackContractBundle:Reference:index.html.twig', array(
            'entities' => $reference,
            'pagination' => $pagination,
            'protocol_id' => $protocol_id,
            'annexe_id' => $annexe_id,
            'annexe' => $annexe
        ));
    }

    public function showAction($protocol_id, $annexe_id, Reference $reference, User $partner)
    {
        $annexe = $this->getDoctrine()->getRepository("BackContractBundle:Annexe")->find($annexe_id);

        $protocol = $this->getDoctrine()
            ->getRepository('BackContractBundle:Protocol')
            ->find($protocol_id);
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($partner->getName(), $this->generateUrl("dash_partner_show", array('id'=>$partner->getId())));
        $breadcrumbs->addItem("Détails réferences", "add_protocol_manager", array());
        return $this->render('BackContractBundle:Reference:show.html.twig', array('entity' => $reference, 'protocol_id' => $protocol_id,
            'annexe_id' => $annexe_id,
            'partner'=>$partner->getId()));
    }

    public function addAction($protocol_id, $annexe_id, User $partner)
    {

        $reference = new Reference();
        $form = $this->createForm(new ReferenceType(), $reference);
        //

        $dateFinDeal = null;
        $testRef = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->findBy(array("defaultannexe" => $annexe_id));
        foreach ($testRef as $item) {
            $dateFinDeal = $item->getEndDate();

        }

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->bind($request);
            if ($form->isValid()) {
				$autreAnnexe =  $request->request->get('autre_annexe');
                $em = $this->getDoctrine()->getManager();
                $annexe = $this->getDoctrine()->getRepository("BackContractBundle:Annexe")->find($annexe_id);
                $reference->setAnnexe($annexe);
                $em->persist($reference);
                $em->flush();
				/*duppliquer dans les autre annexe---*/
				
				for($count=0;$count<count($autreAnnexe);$count++)
				{
				$autrereference = new Reference();
				 $annexeAutre = $this->getDoctrine()->getRepository("BackContractBundle:Annexe")->find($autreAnnexe[$count]);
					$autrereference->setAnnexe($annexeAutre);
					$autrereference->setShopPrice($reference->getShopPrice());
					$autrereference->setBigdealPrice($reference->getBigdealPrice());
					$autrereference->setTitle($reference->getTitle());
					$autrereference->setMaxCoupon($reference->getMaxCoupon());
					$autrereference->setReturnedGoods($reference->getReturnedGoods());
					$autrereference->setShipping($reference->getShipping());
					$autrereference->setDescription($reference->getDescription());
					$em->persist($autrereference);
					$em->flush();
				}
                return $this->redirect($this->generateUrl("dash_partner_show", array('id'=>$partner->getId())));
            } else {
                echo $form->getErrors();
            }
        }
        $annexe = $this->getDoctrine()->getRepository("BackContractBundle:Annexe")->find($annexe_id);

        $protocol = $this->getDoctrine()
            ->getRepository('BackContractBundle:Protocol')
            ->find($protocol_id);
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($partner->getName(), $this->generateUrl("dash_partner_show", array('id'=>$partner->getId())));
        $breadcrumbs->addItem("Ajouter réferences", "add_protocol_manager", array());
		$listAnnexe = $this->getDoctrine()->getRepository("BackContractBundle:Annexe")->findBy(array('protocol' =>$protocol_id));
        return $this->render('BackContractBundle:Reference:new.html.twig', array(
            'form' => $form->createView(),
            'protocol_id' => $protocol_id,
            'annexe_id' => $annexe_id,
            'partner' => $partner->getId(),
            'dateFinDeal' => $dateFinDeal,
			'shipping' => 0,
			'autreAnnexe' => $listAnnexe
			
			));
    }

    public function editAction($protocol_id, $annexe_id, $id,User $partner)
    {
        $request = $this->get('request');
        $reference = $this->getDoctrine()
            ->getRepository('BackContractBundle:Reference')
            ->find($id);
        $shipping = $reference->getShipping();
        $testRef = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->findBy(array('defaultannexe' => $annexe_id));
        //echo $annexe_id;exit;
        //$dateFinDeal = new \DateTime();
        if(count($testRef))
        {
            foreach ($testRef as $item) {
                $dateFinDeal = $item->getEndDate();
            }
        }
        else
            $dateFinDeal = null;
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new ReferenceType(), $reference);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $annexe = $this->getDoctrine()->getRepository("BackContractBundle:Annexe")->find($annexe_id);
            $reference->setAnnexe($annexe);
            $em->flush();

            return $this->redirect($this->generateUrl("dash_partner_show", array('id'=>$partner->getId())));
        } else {
            // echo $form->getErrors();
        }
        $annexe = $this->getDoctrine()->getRepository("BackContractBundle:Annexe")->find($annexe_id);

        $protocol = $this->getDoctrine()
            ->getRepository('BackContractBundle:Protocol')
            ->find($protocol_id);
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($partner->getName(), $this->generateUrl("dash_partner_show", array('id'=>$partner->getId())));
				$listAnnexe = $this->getDoctrine()->getRepository("BackContractBundle:Annexe")->findBy(array('protocol' =>$protocol_id));

        $breadcrumbs->addItem("Modifier réferences", "add_protocol_manager", array());
        return $this->render('BackContractBundle:Reference:new.html.twig', array('form' => $form->createView(), 'id' => $id, 'protocol_id' => $protocol_id,
                'annexe_id' => $annexe_id,
                'dateFinDeal' => $dateFinDeal,
                'partner' => $partner->getId(),
                'shipping' => $shipping,
							'autreAnnexe' => $listAnnexe

				)
        );
    }

    public function deleteAction($protocol_id, $annexe_id, Reference $reference,User $partner)
    {
        $em = $this->getDoctrine()->getManager();

        if (!$reference) {
            throw new NotFoundHttpException("Référence non trouvée");
        }
        $em->remove($reference);
        $em->flush();
        return $this->redirect($this->generateUrl("dash_partner_show", array('id'=>$partner->getId())));
    }

    public function ajxcmdAction()
    {
        $request = $this->get('request');
        //Tools::dump($request->request,true);
        $id = $request->request->get('deal');
        $clientid=$request->request->get('client');
        $client=$this->getDoctrine()->getRepository('BackCommandeBundle:Client')->find($clientid);
        $deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->find($id);
        $annex = $deal->getPlanning()->getDefaultannexe();
        $reference = $annex->getReference();
        $arrReference = array();
        foreach ($reference as $value) {
            $command = $this->getDoctrine()->getRepository('BackCommandeBundle:Command')->findby(array('reference' => $value->getId(), 'etat' => 1));
            $rst = 0;
            foreach ($command as $valcmd) {
                foreach ($valcmd->getCoupon() as $valcoupon) {
                    if ($valcoupon->getVendu() == 2) {
                        ++$rst;
                    }
                }

            }
            // test coupon par user
            $nbcoupon=0;
            $command=$this->getDoctrine()->getRepository('BackCommandeBundle:Command')->findBy(array('deal'=>$deal,'etat'=>1,'client'=>$client));
            foreach($command as $key=>$cmd){
                foreach($cmd->getCoupon() as $coup){
                    if($coup->getVendu()==2 || $coup->getVendu()==3){
                        ++$nbcoupon;
                    }
                }
            }
            //echo $nbcoupon."-";
            if ($nbcoupon>=$deal->getMaxCouponUser()){
                $rst=0;
            }else if($deal->getMaxCouponUser()>$nbcoupon){
                $rst=$deal->getMaxCouponUser()-$nbcoupon;
            }
            ///echo $rst;
            $arrReference[] = array("id" => $value->getId(),
                "name" => "Ref : ANX " . $annex->getObject() . " " . $value->getTitle() . " ( prix :" . $value->getBigdealPrice() . " TND)",
                "qte" => $value->getMaxCoupon(),
                "rest" => $rst,
                "maxcoupon" => $deal->getMaxCouponUser(),
                "livraison" => $value->getShipping(),
            );

        }

        return new JsonResponse($arrReference);

    }

}
