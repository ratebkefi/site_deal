<?php
/**
 * Created by PhpStorm.
 * User: big-deal
 * Date: 27/03/2015
 * Time: 23:45
 */


namespace Main\BookingBundle\Twig\Extension;

use Main\BookingBundle\Controller\BookingController;

class BookingExtension extends \Twig_Extension
{
    protected $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function getFunctions()
    {
        return array(
            'getNamMonth' => new \Twig_Function_Method($this, 'getNamMonth'),
            'dispo' => new \Twig_Function_Method($this, 'dispo'),
            'dispoDate' => new \Twig_Function_Method($this, 'dispoDate'),
            'currentDayRel' => new \Twig_Function_Method($this, 'currentDayRel'),
            'afficherLeMonth' => new \Twig_Function_Method($this, 'afficherLeMonth'),
            'capaciteParHeure' => new \Twig_Function_Method($this, 'capaciteParHeure'),
            'numberBook' => new \Twig_Function_Method($this, 'numberBook'),
            'nombrereservationParJour' => new \Twig_Function_Method($this, 'nombrereservationParJour'),
            'nombreHeureTravailler' => new \Twig_Function_Method($this, 'nombreHeureTravailler'),
            'calculeNombreJourDuMois' => new \Twig_Function_Method($this, 'calculeNombreJourDuMois'),
            'listeBooking' => new \Twig_Function_Method($this, 'listeBooking'),
            'listeBookingPerHoure' => new \Twig_Function_Method($this, 'listeBookingPerHoure'),
            'ListeHour' => new \Twig_Function_Method($this, 'ListeHour'),
        );
    }

    /**
     * @param string $string
     * @return int
     */
    public function capaciteParHeure($deal)
    {

        $sql = "select DISTINCT(sel.capacityPerHour) as capaciteParHeure ";
        $from = " from  Back\PartnerBundle\Entity\Schedule as sche ,";
        $from .= "  Back\DealBundle\Entity\Deal as lea ,";
        $from .= "  Back\PlanningBundle\Entity\Planning as plan ,";
        $from .= "  Back\ContractBundle\Entity\Annexe as ann ,";
        $from .= "  Back\ContractBundle\Entity\Protocol as pro ,";
        $from .= "  Back\PartnerBundle\Entity\SellingPoint as sel ,";
        $from .= "  User\UserBundle\Entity\User as us ";


        $where = " where plan.id   =  lea.planning and ";
        $where .= " plan.defaultannexe  =  ann.id  and ";
        $where .= " ann.protocol  =   pro.id  and ";
        $where .= "  us.id   =  pro.user and ";
        $where .= " us.id  =  sel.user   and ";
        $where .= " sel.id  =  sche.sellingpoint   and ";
        $where .= " lea.id  =  " . $deal . "   and ";
        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where;
        $qb = $this->em->createQuery($query);
        $capaciteParHeure = $qb->getResult();
        foreach ($capaciteParHeure as $value) {
            $capacite = $value["capaciteParHeure"];
        }

        return $capacite;
    }
    public function getDay($date)
    {
        $date = strtotime($date);
        $date = date("l", $date);
        return self::traduireJourFREN($date);
    }
    public function traduireJourFREN($Jour)
    {
        if ($Jour == "Monday") {
            return "Lundi";
        } elseif ($Jour == "Tuesday") {
            return "Mardi";

        } elseif ($Jour == "Wednesday") {
            return "Mercredi";

        } elseif ($Jour == "Thursday") {
            return "Jeudi";

        } elseif ($Jour == "Friday") {
            return "Vendredi";

        } elseif ($Jour == "Saturday") {
            return "Samedi";

        } elseif ($Jour == "Sunday") {
            return "Dimanche";

        }
    }
    public function nombreHeureTravailler($date,$deal)
    {

        /*-----------------------------------------new------------------------------------------------*/
        $dispo = $this->em->getRepository('MainBookingBundle:Booking')->Dispo(self::getDay($date), $deal);
		$capacityPerHour = $this->em->getRepository('MainBookingBundle:Booking')->CapacityPerHour($deal);
		$getCloseTimeMorning = 0;
		$getOpenTimeAfternon = 0;
		$getCloseTimeAfternon = 0;
		$getOpenTimeMorning = 0;
        foreach ($dispo as $value) {
		if(self::getDay($date) == $value->getDay())
		{
		    $getOpenTimeMorning = explode(':', $value->getOpenTimeMorning()->format('H:i:s'));
            $getOpenTimeMorning = $getOpenTimeMorning[0];
            $getCloseTimeMorning = explode(':', $value->getCloseTimeMorning()->format('H:i:s'));
            $getCloseTimeMorning = $getCloseTimeMorning[0];
            $getOpenTimeAfternon = explode(':', $value->getOpenTimeAfternoon()->format('H:i:s'));
            $getOpenTimeAfternon = $getOpenTimeAfternon[0];
            $getCloseTimeAfternon = explode(':', $value->getCloseTimeAfternoon()->format('H:i:s'));
            $getCloseTimeAfternon = $getCloseTimeAfternon[0];
        }
        }
        $capaciteParHeure = $capacityPerHour[0]->getSellingpoint()->getCapacityPerHour();
        $TimeMorning =  $getCloseTimeMorning - $getOpenTimeMorning  ;
        $TimeAfternon = $getCloseTimeAfternon - $getOpenTimeAfternon ;
        if(count($dispo)>0)
            $retour = ($TimeMorning  + $TimeAfternon)*$capaciteParHeure  ;
        else
            $retour = 0;
        return $retour;
        /*-----------------------------------------end new------------------------------------------------*/
    }
    public function ListeHour($date, $deal)
    {
        $sql = "select DISTINCT DATE_FORMAT(book.booking, '%H') as  booking1 ";
        $from = " from Main\BookingBundle\Entity\Booking  as book ";
        $where = " where book.deal = $deal and";
        $where .= "  DATE_FORMAT(book.booking, '%Y-%m-%d') = '$date' and";

        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where;
        $qb = $this->em->createQuery($query);
        return $qb->getResult();
    }

    public function listeBookingPerHoure($dateReservation, $deal)
    {

        $sql = "select book ";
        $from = " from  Main\BookingBundle\Entity\Booking as book ";
        $where = " where book.deal   =  " . $deal . " and ";
        $where .= " book.booking = '$dateReservation'  and ";

        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where;
        $qb = $this->em->createQuery($query);

        return $qb->getResult();

    }

    public function listeBooking($dateReservation, $deal)
    {
        $dateDebut = $dateReservation . " 00:00:00";
        $dateFin = $dateReservation . " 23:59:59";
        $sql = "select book ";
        $from = " from  Main\BookingBundle\Entity\Booking as book ";
        $where = " where book.deal   =  " . $deal . " and ";
        $where .= " book.booking between '$dateDebut' AND '$dateFin'  and ";

        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where;
        $qb = $this->em->createQuery($query);
        return $qb->getResult();

    }

    public function nombrereservationParJour($dateReservation, $deal)
    {
        $sql = "select book ";
        $from = " from  Main\BookingBundle\Entity\Booking as book ";
        $where = " where book.deal   =  " . $deal . " and ";
        $where .= " book.booking Like '" . $dateReservation . "%'  and ";

        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where;
        $qb = $this->em->createQuery($query);
        return count($qb->getResult());

    }

    public function numberBook($dateReservation, $deal)
    {
        $booking = $this->em->getRepository('MainBookingBundle:Booking')->findBy(array("deal" => $deal, "booking" => new \dateTime($dateReservation)));
        return count($booking);
    }

    public function calculeNombreJourDuMois($mois, $annee)
    {
        return cal_days_in_month(CAL_GREGORIAN, $mois, $annee);
    }

    public function dispoDate($deal, $date)
    {
        $disponibilite = $this->em->getRepository('MainBookingBundle:Booking')->dispoDate($deal, $date);
        if (count($disponibilite) > 0)
            return true;
        else
            return false;
    }

    public function dispo($date, $deal)
    {
				$jourMois = explode('-',$date);

		$pauseDay[] = $jourMois[0].'-12'.'-30';
        $pauseDay[] = $jourMois[0].'-12'.'-31';
        $pauseDay[] = $jourMois[0].'-01'.'-01';
        $pauseDay[] = $jourMois[0].'-01'.'-02';
		//echo $jourMois[0]."<br/>";
		//echo $jourMois[1]."<br/>"; exit;
        if(!in_array($date,$pauseDay))
        {
        //BookingController::verifJourDispo($date,$deal);
        $Horaire = $this->em->getRepository('MainBookingBundle:Booking')->horaire($deal);
        for ($count = 0; $count < count($Horaire); ++$count) {
            $daysOfWeek[] = Strtolower(BookingController::traduireJour($Horaire[$count]->getDay()));
        }
        $date = strtotime($date);
        $date = date("l", $date);
        $date = strtolower($date);
        if (in_array($date, $daysOfWeek)) {
            return true;
        } else {
            return false;
        }
    }
	else {
            return false;
        }
    }


    public function currentDayRel($currentDay)
    {
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);

        return $currentDayRel;
    }

    public function afficherLeMonth($month)
    {
        $month1 = str_pad($month, 2, "0", STR_PAD_LEFT);

        return $month1;
    }

    public function getNamMonth($mois)
    {
        if($mois==1)
            return "Janv.";
        if($mois==2)
            return "Févr.";
        if($mois==3)
            return "Mars";
        if($mois==4)
            return "Avr.";
        if($mois==5)
            return "Mai";
        if($mois==6)
            return "Juin";
        if($mois==7)
            return "Juil";
        if($mois==8)
            return "Août";
        if($mois==9)
            return "Sept.";
        if($mois==10)
            return "Oct.";
        if($mois==11)
            return "Nov.";
        if($mois==12)
            return "Déc.";
    }

    public function getName()
    {
        return 'booking_extension';
    }
}
