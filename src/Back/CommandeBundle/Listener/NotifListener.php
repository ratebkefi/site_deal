<?php
namespace Back\CommandeBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Back\DashBundle\Constant;
use Back\DashBundle\Entity\Notification;
use Back\DashBundle\Entity\NotificationSms;

class NotifListener
{
    protected $em;
    protected $session;
    protected $router;
    protected $securityContext;
	public static $SRVID = "67" ;
	public static $PRID = "34" ;
	public static $SC = "BigDeal" ;
	public static $OPID = array(
		"org" => 60501,
		"tt" => 60502,
		"tun" => 60503
		);
		
    public function __construct(ContainerInterface $container, Session $session,EntityManager $em)
    {
        $this->session = $session;
        $this->router = $container->get('router');
        $this->securityContext = $container->get('security.context');
        $this->em = $em;

    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $route = $event->getRequest()->attributes->get('_route');

        if ($event->getRequest()->query->get("notif")) {
            $notif = $event->getRequest()->query->get("notif");
            $repoCompany = $this->em->getRepository('BackDashBundle:Notification');
            $company = $repoCompany->find($notif);
            $company->setEtat(1);
            $this->em->persist($company);
            $this->em->flush();


        }

        if ($route == 'back_dash_homepage') {
            $contractListe = $this->em->getRepository('UserUserBundle:Contract');
            $contract = $contractListe->findAll();

            foreach ($contract as $value)
            {
                $nbSecondes= 60*60*24;

                $debut_ts = strtotime(date('Y-m-d'));
                $fin_ts = strtotime($value->getEnddate()->format('Y-m-d'));
                $diff = $fin_ts - $debut_ts;
                $rest = round($diff / $nbSecondes);

                /*Test si le contract est activé ou pas*/
                if($rest==30 && $value->getStatus()==true)
                {
                    /*-------------------------------------Notification-----------------------------------------------------------------*/

                    $listUserForNotif = Constant\NotifUser::getRappelCollab();
                    $libelleNotif = "Le contrat de  " . $value->getUser()->getName()." expire dans 30 jours.";
                    $lient = $this->router->generate('user_contract_homepage',array("user_id"=>$value->getUser()->getId()));
                    $icone = "icon-building";
                    for($count=1;$count<=count($listUserForNotif);$count++)
                    {
                        $query = $this->em->createQuery(
                                'SELECT u FROM UserUserBundle:User u WHERE u.roles LIKE :role'
                            )->setParameter('role', '%"'.$listUserForNotif[$count].'"%');

                        $listUser = $query->getResult();
                        foreach($listUser as $value)
                        {
                            $notification = new Notification();
                            $notification->setUser($this->em->getRepository("UserUserBundle:User")->find($value->getId()) );
                            $notification->setName($libelleNotif);
                            $notification->setLien($lient);
                            $notification->setIcone($icone);
                            $this->em->persist($notification);
                            $this->em->flush();
                        }
                        unset($listUser);
                    }
                }
            }

            $caisseListe = $this->em->getRepository('BackCommandeBundle:Caisse');
            $caisse = $caisseListe->findAll();

            foreach ($caisse as $valueCaisse)
            {
                $nbS= 60*60;

                $debut_ts = strtotime(date('Y-m-d'));
                $fin_ts = strtotime($valueCaisse->getDateUpdate()->format('Y-m-d'));
                $diff = $debut_ts  - $fin_ts ;
                $restCaisse = round($diff / $nbS);
                $totalCaisse = $valueCaisse->getMontantEspece() + $valueCaisse->getMontantCheque() ;
            if($totalCaisse> 5000 and date('H:i') ==  '11:22')
            {
                $listUserForNotif = Constant\NotifUser::getNouveauTicket();
                $libelleNotif = "Le solde de la caisse  " . $valueCaisse->getLibelle() ."  a dépassé les 5.000 TND";
                $lient = $this->router->generate('list_caissier');
                $icone = "icon-expand";
                for($count=1;$count<=count($listUserForNotif);$count++)
                {
                    $query = $this->em->createQuery(
                        'SELECT u FROM UserUserBundle:User u WHERE u.roles LIKE :role'
                    )->setParameter('role', '%"'.$listUserForNotif[$count].'"%');

                    $listUser = $query->getResult();
                    foreach($listUser as $value)
                    {
                        $notification = new Notification();
                        $notification->setUser($this->em->getRepository("UserUserBundle:User")->find($value->getId()) );
                        $notification->setName($libelleNotif);
                        $notification->setLien($lient);
                        $notification->setIcone($icone);
                        $this->em->persist($notification);
                        $this->em->flush();
                    }
                    unset($listUser);
                }
            }
            if(date('Y') == 18)
            {
                /*-------------------------------------Notification-----------------------------------------------------------------*/

                $listUserForNotif = Constant\NotifUser::getAucunRetrait();
                $libelleNotif = "Aucun retrait n’a été effectué depuis 24h à la caisse  " . $valueCaisse->getLibelle();
                $lient = $this->router->generate('list_caissier');
                $icone = "icon-exclamation";
                for($count=1;$count<=count($listUserForNotif);$count++)
                {
                    $query = $this->em->createQuery(
                        'SELECT u FROM UserUserBundle:User u WHERE u.roles LIKE :role'
                    )->setParameter('role', '%"'.$listUserForNotif[$count].'"%');

                    $listUser = $query->getResult();
                    foreach($listUser as $value)
                    {
                        $notification = new Notification();
                        $notification->setUser($this->em->getRepository("UserUserBundle:User")->find($value->getId()) );
                        $notification->setName($libelleNotif);
                        $notification->setLien($lient);
                        $notification->setIcone($icone);
                        $this->em->persist($notification);
                        $this->em->flush();
                    }
                    unset($listUser);
                }
            }
            }
			
			/*-------listner pour envoyer des sms au client sur les commande non payé-------------*/
					$commandeList = $this->em->getRepository('BackCommandeBundle:Command');
					
					$dateAuj = strtotime(date('Y-m-d'));
					$commandes = $commandeList->getListCommandeEnAttente();
					//exit;
					$nbHeure = 60*60;
					foreach($commandes as $value)
					{
						
					$dateFinDeal = strtotime($value->getDeal()->getPlanning()->getEndDate()->format('Y-m-d'));
					$diff = $dateFinDeal - $dateAuj;
					$rest = round($diff / $nbHeure);

					if($rest > 0 and $rest<20)
					{
					
						if($this->em->getRepository('BackCommandeBundle:Command')->verifierSiDejaNotifier($value->getId(),$value->getClient()->getId())==0)
						{
						if(is_numeric($value->getClient()->getPhone()))
						{
							$tel = $value->getClient()->getPhone();
						}
						else
						{
							$tel = null;
						}
						if(strpos($tel,"+216") === 0)
						{
							$tel = substr($tel, 4);
						}
						elseif(strpos($tel,"00216") === 0)
						{
							$tel = substr($tel, 5);
						}
						
						switch (substr($tel, 0,1)) 
						{
						case '9':
						case '4':
							$opid = self::$OPID['tt'];
						break;
			
						case '5':
							$opid = self::$OPID['org'];
						break;
						case '2':
							$opid = self::$OPID['tun'];
						break;
		}
		
		$msg="Bonjour,".$value->getClient()."\n";

		$msg .="Le deal que vous avez commandé expire le ".$value->getDeal()->getPlanning()->getEndDate()->format('d-m-Y H:i:s').".
Merci de payer votre coupon à l'un de nos Paybox avant la cloture du deal";
		 $message = rawurlencode( $msg);		
$url ='http://smsc.jmt.tn/sendSMS.php?SRVID=67&PRID=34&SC=BigDeal&MOBILE=' . $tel . '&OPID=' . $opid . '&MESSAGE=' . $message . '&ENCODE=0&LOGIN=bigdeal&PASS=big2014deal';

		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$result = curl_exec($ch);
		curl_close($ch);
		
		$smsNotif = new NotificationSms();
		$smsNotif->setMessage($msg);
		$smsNotif->setDcr(new \dateTime());
		$smsNotif->setClient($this->em->getRepository('BackCommandeBundle:Client')->find($value->getClient()->getId()));
		$smsNotif->setCommande($this->em->getRepository('BackCommandeBundle:Command')->find($value->getId()));
		$this->em->persist($smsNotif);
        $this->em->flush();
		
		}
					}
					}
        }
    }



}