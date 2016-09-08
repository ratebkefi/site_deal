<?php

namespace Back\DealBundle\Controller;

use Back\DealBundle\Entity\Vote;
use Back\DealBundle\Form\DealFilterType;
use Back\DealBundle\Form\CommentFilterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\DashBundle\Entity\BigFidHistorique;

use Back\DealBundle\Form\DealType;
use Back\DashBundle\Common\Tools;

class CommentController extends Controller
{
    public function messagebarAction(){
        $unreaded = $this->getDoctrine()->getRepository('BackDealBundle:Vote')->findBy(array('act'=>false));
        $comment = $this->getDoctrine()->getRepository('BackDealBundle:Vote')->findAll();
        return $this->render('BackDealBundle:Comment:messagebar.html.twig', array(
            'unreaded'=>$unreaded,'comment'=>$comment
        ));
    }
    public function countcommentAction(){
        $comment = $this->getDoctrine()->getRepository('BackDealBundle:Vote')->findBy(array('act'=>false));
        $nb=count($comment);
        return $this->render('BackDealBundle:Comment:count.html.twig', array(
            'nb' => $nb
        ));

    }
    public function indexAction(Request $request)
    {
        $form = $this->createForm(new CommentFilterType());
        $data = $request->query->get('back_dealbundle_filter_comment');
        $data = Tools::dropNull($data);
        $form->bind($request);

        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des deals", $this->generateUrl("back_deal"), array());
        $breadcrumbs->addItem("Commentaires", $this->generateUrl("back_comment"), array());
        $comment = $this->getDoctrine()->getRepository('BackDealBundle:Vote')->listVote($data);
       // $comment = $this->getDoctrine()->getRepository('BackDealBundle:Vote')->findBy(array(), array('createdAt' => 'DESC'));
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $comment, $request->query->get('page', 1)/* page number */, 20/* limit per page */
        );
        return $this->render('BackDealBundle:Comment:index.html.twig', array('entities' => $comment,
            'pagination' => $pagination,'form' => $form->createView()
        ));
    }

    public function activateAction(Vote $comment)
    {
        $em = $this->getDoctrine()->getEntityManager();
        if ($comment->getAct() == 1) {

            $comment->setAct(false);
            $em->persist($comment);
            $em->flush();
        } else {
            $comment->setAct(true);
            $em->persist($comment);
            $em->flush();

            $rate = $this->getDoctrine()->getRepository('BackDealBundle:Rating')->find($comment->getRating()->getId());
            /*NEW*/ 
            $verifierVote = $this->getDoctrine()->getRepository("BackDealBundle:Vote")->findBy(array("rating" =>$rate,"voter"=>$comment->getVoter()->getId()));

            $nbvalid = 1;
            foreach($verifierVote as $verif){
                if($verif->getAct()==1){
                    ++$nbvalid;
                }
            }


            if($nbvalid==2)
            {
                // ajouter 20 point bigFid
                $tauxBigFid = 20;
                $historique = new BigFidHistorique();
                $historique->setMontant($tauxBigFid);
                $historique->setDcr(new \DateTime());
                $historique->setMotif("Bonus enquête satisfaction");
                $historique->setClient($this->getDoctrine()->getRepository("BackCommandeBundle:Client")->find($comment->getVoter()->getId()));
                $historique->setOperation(1);
                $em->persist($historique);
                $em->flush();
                //envoie mail au client
                $deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->find($comment->getRating()->getId());
                $messageMail = \Swift_Message::newInstance()
                    ->setSubject('Félicitation, vous venez de gagner 20 points BIGFid ! ')
                    ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                    ->setTo($comment->getVoter()->getEmail())
                    ->setBody($this->renderView('MainFrontBundle:Email:confirmEnquetteSatisfaction.html.twig', array("client" => $comment->getVoter(),"deal" =>$deal)));
                $messageMail->setContentType("text/html");
                $this->get('mailer')->send($messageMail);
            }
            /*END*/

        }
        $allvote=$comment->getRating()->getVotes();
        $nb= 0;$somme=0;
        foreach($allvote as $value){
            if($value->getAct()){
                ++$nb;
                $somme+=$value->getValue();
            }
        }
        if($nb>0){
            $rate=$somme/$nb;
        }else{
            $rate=0;
        }
        $rating=$comment->getRating();
        $rating->setRate($rate);
        $rating->setNumVotes($nb);
        $em->persist($rating);
        $em->flush();


        return $this->redirect($this->generateUrl('back_comment'));
    }

    public function deleteAction(Vote $deal)
    {
        if (!$deal) {
            throw $this->createNotFoundException('No Comment found');
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($deal);
        $em->flush();

        return $this->redirect($this->generateUrl('back_comment'));
    }

}
