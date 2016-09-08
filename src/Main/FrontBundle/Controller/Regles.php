<?php

namespace Main\FrontBundle\Controller;
namespace Back\DashBundle\Entity\BigFidHistorique;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Regles extends Controller
{
    public function regleInscription($idClient)
    {
        $em = $this->getDoctrine()->getManager();
        //si regle active et n'est pas expiré
        $active = $this->getDoctrine()->getRepository('BackDashBundle:Regle')->activerInscription();
        foreach ($active as $value) {
            $nombre = $value->nombre;
        }
		
        if ($nombre>0) {
            //insertion 20big pour ce client
            $tauxBigFid = 20;
            $client = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->find($idClient);
            $client->setBigFid($tauxBigFid);
            $em->persist($client);
            $em->flush();
            //insertion 20big pour historique de ce client
            $historique = new BigFidHistorique();
            $historique->setMontant($tauxBigFid);
            $historique->setDcr(new \DateTime());
            $historique->setMotif("Bonus d'inscription");
            $historique->setClient($client);
            $em->persist($historique);
            $em->flush();

        }
    }

    public function reglePartage($idClient, $idDeal)
    {
        $em = $this->getDoctrine()->getManager();

        //si regle active et n'est pas expiré
        $active = $this->getDoctrine()->getRepository('BackDashBundle:Regle')->activerPartage();
        foreach ($active as $value) {
            $nombre = $value->nombre;
        }
        if ($nombre>0) {
            $BigFid = $this->getDoctrine()->getRepository('BackDashBundle:Parameter')->find(1);
            $valeurBigFid = $BigFid->getValeur();
            //recuperer Prix deal
            $deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->find($idDeal);
            $prixDeal = $deal->getPlanning()->getPlanning()->getDefaultannexe()->getReference()->getBigdealPrice();
            $tauxBigFid = round($prixDeal * $valeurBigFid * 0.1) ;
            //insertion 10% prix deal au client qui fait la partage
            $client = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->find($idClient);
            $client->setBigFid($tauxBigFid);
            $em->persist($client);
            $em->flush();
            //insertion 10% pour historique de ce client
            $historique = new BigFidHistorique();
            $historique->setMontant($tauxBigFid);
            $historique->setDcr(new \DateTime());
            $historique->setMotif("Bonus partage sur facebook");
            $historique->setClient($client);
            $em->persist($historique);
            $em->flush();
        }

    }

     
}
