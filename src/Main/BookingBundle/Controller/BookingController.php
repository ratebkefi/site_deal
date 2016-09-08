<?php

namespace Main\BookingBundle\Controller;

use Main\BookingBundle\Entity\Booking;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\DashBundle\Common\Tools;

class BookingController extends Controller
{

    public function indexAction()
    {

        return $this->render('MainBookingBundle:Booking:index.html.twig', array());
    }

    public function bookAction($deal, $date, $codeCoupon)
    {
        $booking = new Booking();
        $request = $this->get('request');
        $em = $this->getDoctrine()->getManager();
        $reservation = $request->query->get('reservation');

        if ($reservation) {
          //  echo $reservation; exit;
            $oldBooking = $this->getDoctrine()->getRepository('MainBookingBundle:Booking')->findBy(array("coupon" => $codeCoupon));
            if ($oldBooking) {
                foreach ($oldBooking as $value) {
                    $em->remove($value);
                    $em->flush();
                }

            }
            $coupon = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->find($codeCoupon);
            $LeDeal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->find($deal);

            //$HoureReservation = $request->request->get('booking');

          //  $hourBook = $HoureReservation . ":00:00";
            $dateBooking = $date ;

            $booking->setBooking(new \DateTime($dateBooking));
            $booking->setDcr(new \DateTime());
            $booking->setCoupon($coupon);
            $booking->setDeal($LeDeal);
            $em->persist($booking);
            $em->flush();
            $message = "Votre réservation a été bien prise en compte chez " . $LeDeal->getPlanning()->getDefaultannexe()->getProtocol()->getUser() . " le  " . $booking->getBooking()->format('d/m/Y'). " à ".$booking->getBooking()->format('H')."H";
            $this->get('session')->getFlashBag()->set('alert-success', $message);
            return $this->redirect($this->generateUrl('front_booking_step1'));

        } else {


            $dispo = $this->getDoctrine()->getRepository('MainBookingBundle:Booking')->Dispo(self::getDay($date), $deal);
            foreach ($dispo as $value) {
                $getOpenTimeMorning = explode(':', $value->getOpenTimeMorning()->format('H:i:s'));
                $getOpenTimeMorning = $getOpenTimeMorning[0];
                $getCloseTimeMorning = explode(':', $value->getCloseTimeMorning()->format('H:i:s'));
                $getCloseTimeMorning = $getCloseTimeMorning[0];
                $getOpenTimeAfternon = explode(':', $value->getOpenTimeAfternoon()->format('H:i:s'));
                $getOpenTimeAfternon = $getOpenTimeAfternon[0];
                $getCloseTimeAfternon = explode(':', $value->getCloseTimeAfternoon()->format('H:i:s'));
                $getCloseTimeAfternon = $getCloseTimeAfternon[0];
            }
            // echo explode(':',$getOpenTimeMorning)[0]."<br><br>";
            for ($count = $getOpenTimeMorning; $count <= $getCloseTimeMorning; ++$count) {
                $morning[] = $count;
            }
            for ($count = $getOpenTimeAfternon; $count <= $getCloseTimeAfternon; ++$count) {
                $afternon[] = $count;
            }
            return $this->render('MainBookingBundle:Booking:book.html.twig', array("date" => $date, "deal" => $deal, "codeCoupon" => $codeCoupon, "morning" => $morning, "afternon" => $afternon));
        }
    }

    public function horaireAction($deal, $date)
    {
        $request = $this->get('request');
        $dispo = $this->getDoctrine()->getRepository('MainBookingBundle:Booking')->Dispo(self::getDay($date), $deal);
        foreach ($dispo as $value) {
            $getOpenTimeMorning = explode(':', $value->getOpenTimeMorning()->format('H:i:s'));
            $getOpenTimeMorning = $getOpenTimeMorning[0];
            $getCloseTimeMorning = explode(':', $value->getCloseTimeMorning()->format('H:i:s'));
            $getCloseTimeMorning = $getCloseTimeMorning[0];
            $getOpenTimeAfternon = explode(':', $value->getOpenTimeAfternoon()->format('H:i:s'));
            $getOpenTimeAfternon = $getOpenTimeAfternon[0];
            $getCloseTimeAfternon = explode(':', $value->getCloseTimeAfternoon()->format('H:i:s'));
            $getCloseTimeAfternon = $getCloseTimeAfternon[0];
        }
        // echo explode(':',$getOpenTimeMorning)[0]."<br><br>";
        for ($count = $getOpenTimeMorning; $count <= $getCloseTimeMorning; ++$count) {
            $morning[] = $count;
        }
        for ($count = $getOpenTimeAfternon; $count <= $getCloseTimeAfternon; ++$count) {
            $afternon[] = $count;
        }
        return $this->render('MainBookingBundle:Booking:horaire.html.twig', array("date" => $date, "deal" => $deal, "morning" => $morning, "afternon" => $afternon));

    }

    public function step1Action()
    {
        $request = $this->get('request');
        $codeCoupon = $request->request->get('code_coupon');
        $idCoupon = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->findBy(array("code" => $codeCoupon, "recu" => 1, "vendu" => 3));
        if (count($idCoupon) > 0) {
            foreach ($idCoupon as $value) {
                $couponId = $value->getId();

            }
            $couponReserver = $this->getDoctrine()->getRepository('MainBookingBundle:Booking')->findBy(array("coupon" => $couponId));
            if (count($couponReserver) > 0) {
                foreach ($couponReserver as $value) {
                    $dateReservation = $value->getBooking();
                }
                $message = "Coupon " . $codeCoupon . " a déja été réservé le " . $dateReservation->format('d/m/Y') . " à ".$dateReservation->format("H")."H";
                $this->get('session')->getFlashBag()->set('alert-danger', $message);
                return $this->redirect($this->generateUrl('front_booking_step1'));
            }
            $disponibilite = $this->getDoctrine()->getRepository('MainBookingBundle:Booking')->disponibilite($couponId);
			//echo count($disponibilite); exit;
            foreach ($disponibilite as $values) {
                $idDeal = $values->getId();
                $dateDebutValiditeCoupon = $values->getStartDateValidtyCoupon()->format('Y-m-d');
                $moiDebutValiditeCoupon = $values->getStartDateValidtyCoupon()->format('m');
                $yearDebutValiditeCoupon = $values->getStartDateValidtyCoupon()->format('Y');
                $dateFinValiditeCoupon = $values->getEndDateValidtyCoupon()->format('Y-m-d');
                $yearFinValiditeCoupon = $values->getEndDateValidtyCoupon()->format('Y');
                $moiFinValiditeCoupon = $values->getEndDateValidtyCoupon()->format('m');
            }
			if($moiFinValiditeCoupon)
			{
				$month = $moiDebutValiditeCoupon;
				$year = $yearDebutValiditeCoupon;
				return $this->redirect($this->generateUrl('front_booking_step2', array("code_coupon" => $codeCoupon, "month" => $month, "year" => $year)));

			}
			else
			{
				$this->get('session')->getFlashBag()->set('alert-danger', 'Réservation indisponible veuillez contacter le service client, Merci');
				return $this->redirect($this->generateUrl('front_booking_step1'));
			}
        } else {
            $this->get('session')->getFlashBag()->set('alert-danger', 'Code coupon n\'existe pas');
            return $this->redirect($this->generateUrl('front_booking_step1'));

        }


        //  return $this->render('MainBookingBundle:Booking:step1.html.twig', array("code_coupon"=>$codeCoupon,"month"=>$month,"year"=>$year));
    }

    public function step2Action($code_coupon, $month, $year)
    {
        $request = $this->get('request');
        $codeCoupon = $code_coupon;
        $idCoupon = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->findBy(array("code" => $codeCoupon, "recu" => 1, "vendu" => 3));
        if (count($idCoupon) > 0) {
            foreach ($idCoupon as $value) {
                $couponId = $value->getId();

            }
            $couponReserver = $this->getDoctrine()->getRepository('MainBookingBundle:Booking')->findBy(array("coupon" => $couponId));
            $disponibilite = $this->getDoctrine()->getRepository('MainBookingBundle:Booking')->disponibilite($couponId);
            foreach ($disponibilite as $values) {
                $idDeal = $values->getId();
                $moiDebutValiditeCoupon = $values->getStartDateValidtyCoupon()->format('m');
                $moiFinValiditeCoupon = $values->getEndDateValidtyCoupon()->format('m');
            }


            for ($count = $moiDebutValiditeCoupon; $count <= $moiFinValiditeCoupon; ++$count) {
                $listMont[] = $count;
            }


            //calandar
            $daysOfWeek = array('Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim');
            /*-------------------New------------------*/

            $cMonth = $month;
            $cYear = $year;

            $prev_year = $cYear;
            $next_year = $cYear;
            $prev_month = $cMonth - 2;
            $next_month = $cMonth + 2;

            if ($prev_month == -1) {
                $prev_month = 12;
                $prev_year = $cYear - 1;
            }
            if ($next_month == 14 or $next_month == 13) {
                $next_month = 1;
                $next_year = $cYear + 1;
            }

            $firstDayOfNextMonth = mktime(0, 0, 0, $month +1, 1, $year);
            $numberDays1 = date('t', $firstDayOfNextMonth);
            $dateComponents1 = getdate($firstDayOfNextMonth);
            if ($dateComponents1['wday'] - 1 >= 0)
                $dayOfWeek1 = $dateComponents1['wday'] - 1;
            else
                $dayOfWeek1 = 6;

            $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
            $numberDays = date('t', $firstDayOfMonth);
            $dateComponents = getdate($firstDayOfMonth);
            if ($dateComponents['wday'] - 1 >= 0)
                $dayOfWeek = $dateComponents['wday'] - 1;
            else
                $dayOfWeek = 6;


            return $this->render('MainBookingBundle:Booking:calendrier.html.twig', array("next_month" => $next_month, "next_year" => $next_year, "prev_month" => $prev_month
            , "prev_year" => $prev_year, "couponReserver" => $couponReserver, "coupon" => $codeCoupon, "codeCoupon" => $couponId, "dayOfWeek" => $dayOfWeek, "dayOfWeek1" => $dayOfWeek1
            ,"numberDays1" => $numberDays1, "numberDays1" => $numberDays1, "numberDays" => $numberDays, "daysOfWeek" => $daysOfWeek,  "deal" => $idDeal
            , "month" => $month, "year" => $year
            ));

        } else {
            $this->get('session')->getFlashBag()->set('alert-danger', 'Problém avec votre code coupon.');
            return $this->redirect($this->generateUrl('front_booking_step1', array()));
        }
    }

    public function disponibiliteAction($id)
    {
        $request = $this->get('request');


        $disponibilite = $this->getDoctrine()->getRepository('MainBookingBundle:Booking')->disponibiliteByDeal($id);
        foreach ($disponibilite as $values) {
            $idDeal = $values->getId();
            $dateDebutValiditeCoupon = $values->getStartDateValidtyCoupon()->format('Y-m-d');
            $moiDebutValiditeCoupon = $values->getStartDateValidtyCoupon()->format('m');
            $yearDebutValiditeCoupon = $values->getStartDateValidtyCoupon()->format('Y');
            $dateFinValiditeCoupon = $values->getEndDateValidtyCoupon()->format('Y-m-d');
            $yearFinValiditeCoupon = $values->getEndDateValidtyCoupon()->format('Y');
            $moiFinValiditeCoupon = $values->getEndDateValidtyCoupon()->format('m');
        }
		if(! $moiDebutValiditeCoupon)
		{
				return $this->redirect($this->generateUrl('main_front_homepage'));
		}
        $Horaire = $this->getDoctrine()->getRepository('MainBookingBundle:Booking')->horaire($id);


        /*-------------------New------------------*/
        if ($request->query->get('month')) {
            $cMonth = (int)$request->query->get('month');
        } else {
            $cMonth = $moiDebutValiditeCoupon;
        }
        if ($request->query->get('year')) {
            $cYear = (int)$request->query->get('year');
        } else {
            $cYear = $yearDebutValiditeCoupon;

        }

        //calandar
        $daysOfWeek = array('Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim');


        /*-------------------New------------------*/


       // $cMonth = $month;
       // $cYear = $year;

        $prev_year = $cYear;
        $next_year = $cYear;
        $prev_month = $cMonth - 2;
        $next_month = $cMonth + 2;

        if ($prev_month == -1) {
            $prev_month = 12;
            $prev_year = $cYear - 1;
        }
        if ($next_month == 14 or $next_month == 13) {
			
            $next_month = 1;
            $next_year = $cYear + 1;
        }

        $firstDayOfNextMonth = mktime(0, 0, 0, $cMonth +1, 1, $cYear);
        $numberDays1 = date('t', $firstDayOfNextMonth);
        $dateComponents1 = getdate($firstDayOfNextMonth);
        if ($dateComponents1['wday'] - 1 >= 0)
            $dayOfWeek1 = $dateComponents1['wday'] - 1;
        else
            $dayOfWeek1 = 6;

        $firstDayOfMonth = mktime(0, 0, 0, $cMonth, 1, $cYear);
        $numberDays = date('t', $firstDayOfMonth);
        $dateComponents = getdate($firstDayOfMonth);
        if ($dateComponents['wday'] - 1 >= 0)
            $dayOfWeek = $dateComponents['wday'] - 1;
        else
            $dayOfWeek = 6;

        return $this->render('MainBookingBundle:Booking:disponibilite.html.twig', array('id' => $id,
            "next_month" => $next_month, "next_year" => $next_year, "prev_month" => $prev_month, "year" => $cYear, "month" => $cMonth, "prev_year" => $prev_year
        , "dayOfWeek" => $dayOfWeek, "dayOfWeek1" =>$dayOfWeek1,"numberDays" => $numberDays,"numberDays1" => $numberDays1, "daysOfWeek" => $daysOfWeek, "horaire" => $Horaire, "deal" => $id,
            "endmonth" => $moiFinValiditeCoupon
        , "endyear" => $yearFinValiditeCoupon));

    }

    public function loadAction()
    {
        return $this->render('MainBookingBundle:Booking:load.html.twig');

    }

    public function getDateValiditerCoupon($deal)
    {
        return $this->getDoctrine()->getRepository('BackBookingBundle:Deal')->Fin($deal);

    }

    public static function traduireJour($Jour)
    {
        if ($Jour == "Lundi") {
            return "Monday";
        } elseif ($Jour == "Mardi") {
            return "Tuesday";

        } elseif ($Jour == "Mercredi") {
            return "Wednesday";

        } elseif ($Jour == "Jeudi") {
            return "Thursday";

        } elseif ($Jour == "Vendredi") {
            return "Friday";

        } elseif ($Jour == "Samedi") {
            return "Saturday";

        } elseif ($Jour == "Dimanche") {
            return "Sunday";

        }
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

    public function getDay($date)
    {
        $date = strtotime($date);
        $date = date("l", $date);
        return self::traduireJourFREN($date);
    }

    public function verifJourDispo($date, $deal)
    {
        $Horaire = $this->getDoctrine()->getRepository('MainBookingBundle:Booking')->horaire($deal);
        for ($count = 0; $count < count($Horaire); ++$count) {
            $daysOfWeek[] = Strtolower(self::traduireJour($Horaire[$count]->getDay()));
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


}
