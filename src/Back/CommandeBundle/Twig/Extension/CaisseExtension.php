<?php
/**
 * Created by PhpStorm.
 * User: big-deal
 * Date: 27/03/2015
 * Time: 23:45
 */


namespace Back\CommandeBundle\Twig\Extension;

use Back\CommandeBundle\Controller\CommandeController;

class CaisseExtension extends \Twig_Extension
{
    protected $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function getFunctions()
    {
        return array(
            'dealPasser' => new \Twig_Function_Method($this, 'dealPasser'),
            'couponARembouser' => new \Twig_Function_Method($this, 'couponARembouser'),
            'nombreCouponARembouser' => new \Twig_Function_Method($this, 'nombreCouponARembouser'),
            'montantEspece' => new \Twig_Function_Method($this, 'montantEspece'),
            'lastRetrait' => new \Twig_Function_Method($this, 'lastRetrait'),
            'nbrCouponAcheter' => new \Twig_Function_Method($this, 'nbrCouponAcheter'),

            'montantCheque' => new \Twig_Function_Method($this, 'montantCheque'),
            'getIndicationAdresse' => new \Twig_Function_Method($this, 'getIndicationAdresse'),
            'getAdresse' => new \Twig_Function_Method($this, 'getAdresse'),
            'getCouponVendu' => new \Twig_Function_Method($this, 'getCouponVendu'),
            'getnombreShareFacebook' => new \Twig_Function_Method($this, 'getnombreShareFacebook'),
            'nombreCommande' => new \Twig_Function_Method($this, 'nombreCommande'),
            'montantCoupon' => new \Twig_Function_Method($this, 'montantCoupon'),
            'clientCoupon' => new \Twig_Function_Method($this, 'clientCoupon'),
            'getLastReply' => new \Twig_Function_Method($this, 'getLastReply'),
            'getNumberReply' => new \Twig_Function_Method($this, 'getNumberReply'),
            'listeMessage' => new \Twig_Function_Method($this, 'listeMessage'),
            'listeNotification' => new \Twig_Function_Method($this, 'listeNotification'),
            'listeNotificationVu' => new \Twig_Function_Method($this, 'listeNotificationVu'),
            'verifPlanningLie' => new \Twig_Function_Method($this, 'verifPlanningLie'),
            'timeAgo' => new \Twig_Function_Method($this, 'timeAgo'),
            'nombreAcheteursReferenceParClient' => new \Twig_Function_Method($this, 'getNombreAcheteursReferenceParClient'),


        );
    }

    /**
     * @param string $string
     * @return int
     */
    public function nbrCouponAcheter($idDeal,$idClient)
    {
        $listCoupon=count($this->em->getRepository('BackDealBundle:Deal')->getNbrCouponParClient($idDeal,$idClient));

        return $listCoupon;
    }
    public function dealPasser($id)
    {
        return $this->em->getRepository('BackDealBundle:Deal')->findDealPasser($id);

    }

    public function getNombreAcheteursReferenceParClient($idClient, $reference)
    {
        return $this->em->getRepository('BackDealBundle:Deal')->findAcheteurByReferenceParClient($idClient, $reference);

    }

    public function timeAgo($datetime)
    {
        $time = strtotime($datetime);
        $diff = time() - $time;
        $diff /= 60;
        $var1 = floor($diff);
        $var = $var1 <= 1 ? 'min' : 'minute';
        if ($diff >= 60) {
            $diff /= 60;
            $var1 = floor($diff);
            $var = $var1 <= 1 ? 'hr' : 'heure';
            if ($diff >= 24) {
                $diff /= 24;
                $var1 = floor($diff);
                $var = $var1 <= 1 ? 'day' : 'jour';
                if ($diff >= 30.4375) {
                    $diff /= 30.4375;
                    $var1 = floor($diff);
                    $var = $var1 <= 1 ? 'month' : 'mois';
                    if ($diff >= 12) {
                        $diff /= 12;
                        $var1 = floor($diff);
                        $var = $var1 <= 1 ? 'year' : 'année';
                    }
                }
            }
        }
        return 'Il y a ' . $var1 . ' ' . $var;
    }

    public function nombreCouponARembouser($idTicket)
    {

        $sql = "select count(cp) as nombre ";
        $from = " from Back\CommandeBundle\Entity\Ticket as tick,";
        $from .= "Back\CommandeBundle\Entity\Command as cmd, ";
        $from .= "Back\CommandeBundle\Entity\Coupon as cp ";
        $where = " WHERE tick.commande = cmd.id and ";
        $where .= " cp.command = cmd.id and ";
        $where .= " cp.vendu   = 4 and ";
        $where .= " tick.id   = " . $idTicket . " and ";
        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where . " ";

        $qb = $this->em->createQuery($query)->getSingleScalarResult();

        return $qb;
    }

    public function couponARembouser($idTicket)
    {

        $sql = "select cp ";
        $from = " from Back\CommandeBundle\Entity\Ticket as tick,";
        $from .= "Back\CommandeBundle\Entity\Command as cmd, ";
        $from .= "Back\CommandeBundle\Entity\Coupon as cp ";
        $where = " WHERE tick.commande = cmd.id and ";
        $where .= " cp.command = cmd.id and ";
        $where .= " cp.vendu   = 4 and ";
        $where .= " tick.id   = " . $idTicket . " and ";
        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where . " ";

        $qb = $this->em->createQuery($query);
        $result = $qb->getResult();
        return $result;
    }

    public function verifPlanningLie($idPlanning)
    {
        $sql = "select ann ";
        $from = " from Back\ContractBundle\Entity\Annexe as ann,";
        $where = " where ann.planning=" . $idPlanning . " and";
        //$where .= " cmd.client =" . $client . " and ";

        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where . "   ";

        $qb = $this->em->createQuery($query);;
        $result = $qb->getResult();
        return count($result);
    }

    public function listeNotificationVu($user)
    {
        $sql = "select noti ";
        $from = " from Back\DashBundle\Entity\Notification as noti,";
        $where = " where noti.user=" . $user . " and noti.etat=0 and";
        //$where .= " cmd.client =" . $client . " and ";

        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where . "  order by noti.dcr DESC ";

        $qb = $this->em->createQuery($query);;
        $result = $qb->getResult();
        return $result;
    }

    public function listeNotification($user)
    {
        $sql = "select noti ";
        $from = " from Back\DashBundle\Entity\Notification as noti,";
        $where = " where noti.user=" . $user . " and noti.etat=0 and";
        //$where .= " cmd.client =" . $client . " and ";

        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where . "  order by noti.dcr DESC ";

        $qb = $this->em->createQuery($query)->setMaxResults(6);;
        $result = $qb->getResult();
        return $result;
    }

    public function listeMessage($idTicket)
    {
        $sql = "select msg ";
        $from = " from Back\CommandeBundle\Entity\TicketMessage as msg,";
        $where = " where msg.ticket=" . $idTicket . " and";
        //$where .= " cmd.client =" . $client . " and ";

        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where . "  order by msg.dpa  DESC";;
        $qb = $this->em->createQuery($query);
        // echo $qb->getSql();
        $result = $qb->getResult();
        return $result;

    }

    public function getNumberReply($idTicket)
    {
        $ticket = $this->em->getRepository('BackCommandeBundle:TicketMessage')->findBy(
            array('ticket' => $idTicket)
        );
        return count($ticket);
    }

    public function getLastReply($idTicket)
    {
        $ticket = $this->em->getRepository('BackCommandeBundle:TicketMessage')->findBy(
            array('ticket' => $idTicket),
            array('dpa' => 'DESC')
        );
        foreach ($ticket as $value) {
            return $value->getDpa();
        }

    }

    public function montantCoupon($user)
    {
        $coupon = $this->em->getRepository('BackCommandeBundle:Coupon')->findby(array("command" => $user));
        foreach ($coupon as $value) {
            return $value->getPrice() . " TND";
        }

    }

    public function clientCoupon($user)
    {
        $coupon = $this->em->getRepository('BackCommandeBundle:Coupon')->findby(array("command" => $user));
        foreach ($coupon as $value) {
            return $value->getClient();
        }

    }

    public function nombreCommande($client)
    {
        //and cp.recu=1
        $sql = "select count(cmd) as nombre ";
        $from = " from Back\CommandeBundle\Entity\Command as cmd,";
        $where = " where cmd.etat=1 and";
        $where .= " cmd.client =" . $client . " and ";

        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where;
        $qb = $this->em->createQuery($query);

        $result = $qb->getResult();
        return $result[0]['nombre'];
    }
	
	public function getnombreShareFacebook($deal)
	{
	    $sql = "select count(pst) as nombre ";
        $from = " from Main\FrontBundle\Entity\Post as pst,";
        $where = " where pst.idDeal = " . $deal . " and ";

        //$where .= " cmd.deal =" . $deal . " and ";

        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where;
		
        $qb = $this->em->createQuery($query);
//echo $qb->getSql(); exit;
        $result = $qb->getResult();
        return $result[0]['nombre'];
    
	}
	
    public function getCouponVendu($deal)
    {
        //and cp.recu=1
        $sql = "select count(cp) as nombre ";
        $from = " from Back\CommandeBundle\Entity\Command as cmd,";
        $from .= "  Back\CommandeBundle\Entity\Coupon as cp,";
        $where = " where cmd.id = cp.command and";
        $where .= "  cp.vendu in( 2,3)   and";

        $where .= " cmd.deal =" . $deal . " and ";

        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where;
        $qb = $this->em->createQuery($query);

        $result = $qb->getResult();
        return $result[0]['nombre'];
    }

    public function getIndicationAdresse($client)
    {
        $indixationAdresse = $this->em->getRepository('BackCommandeBundle:Adress')->findby(array("client" => $client));
        foreach ($indixationAdresse as $value) {
            return $value->getIndcation();
        }
    }

    public function getAdresse($client)
    {
        $adresse = $this->em->getRepository('BackCommandeBundle:Adress')->findby(array("client" => $client));
        foreach ($adresse as $value) {
            return $value->getAdress();
        }
    }
    public  function lastRetrait($caisse)
    {
        $lastRetrait = $this->em->getRepository('BackCommandeBundle:Operation')->lastRetrait($caisse);
        return $lastRetrait;
    }
    public function montantEspece($user)
    {
        $caisse = $this->em->getRepository('BackCommandeBundle:Caisse')->findby(array("user" => $user));
        foreach ($caisse as $value) {
            return $value->getMontantEspece() . " TND";
        }
    }

    public function montantCheque($user)
    {
        $caisse = $this->em->getRepository('BackCommandeBundle:Caisse')->findby(array("user" => $user));
        foreach ($caisse as $value) {
            return $value->getMontantCheque() . " TND";
        }

    }


    public function getName()
    {
        return 'caisse_extension';
    }
}
