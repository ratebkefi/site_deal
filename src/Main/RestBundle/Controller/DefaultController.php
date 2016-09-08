<?php

namespace Main\RestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\DashBundle\Constant;
use Symfony\Component\HttpFoundation\Response;
use Back\DashBundle\Entity\Notification;
use Symfony\Component\Validator\Constraints\DateTime;
use Back\CommandeBundle\Entity\Checkc;

class DefaultController extends Controller {

    public function checkAction($iduser, $codecoupon, $key) {
        $messages = array(
            'success' => array(
                'success' => true,
                'message' => 'VALID_COUPON'
            ),
            'fail' => array(
                'success' => false,
                'message' => 'INVALID_USER'
            ),
            'failc' => array(
                'success' => false,
                'message' => 'COUPON_UNPAID'
            ),
            'faild' => array(
                'success' => false,
                'message' => 'COUPON_CONSUMED'
            ),
            'secret' => array(
                'success' => false,
                'message' => 'INVALID_AUTH'
            )
        );
        $type = 'application/json';
        $return_fail = json_encode($messages['fail']);
        $return_failc = json_encode($messages['failc']);
        $return_faild = json_encode($messages['faild']);
        $return_secret = json_encode($messages['secret']);
        if ($this->container->getParameter('secret') !== $key) {
            return new Response($return_secret, 200, array('Content-Type' => $type));
        }
        $user = $this->getDoctrine()->getRepository('UserUserBundle:User')->find($iduser);
        if ($user == null) {
            return new Response($return_fail, 200, array('Content-Type' => $type));
        } else if (!in_array('PARTENAIRE', $user->getRoles())) {
            return new Response($return_fail, 200, array('Content-Type' => $type));
        } else if ($user->isEnabled() == 0) {
            return new Response($return_fail, 200, array('Content-Type' => $type));
        } else {
            //echo $codecoupon; exit;
            $coupon = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->findBy(array("code" => $codecoupon));
            //echo count($coupon); exit;
            if (count($coupon) == 0) {
                return new Response($return_failc, 200, array('Content-Type' => $type));
            } else {
                $currentcoupon = $coupon[0];
                //echo $currentcoupon->getVendu(); exit;
                if (($currentcoupon->getVendu() != 3) or ($currentcoupon->getRecu() == 2) or ($currentcoupon->getRecu() == 3)) {
                    return new Response($return_failc, 200, array('Content-Type' => $type));
               
                } else {
                    // si le partenaire est king size ou Green meals ou farm ranch ou  café tout le temps
                    if(($user->getId()==422) or ($user->getId()==502) or ($user->getId()==432) or ($user->getId()==452))
                    {
                        $nombreCheck = $this->getDoctrine()->getRepository('BackCommandeBundle:Checkc')->findBy(array("coupon" => $currentcoupon->getId()));
                        
                        if(count($nombreCheck)<4)
                        {
                            /* $return_success = json_encode($messages['success']);
                            return new Response($return_success, 200, array('Content-Type' => $type));
                            exit; */
                            $check = new Checkc();
                            $check->setCoupon($currentcoupon);
                            $check->setDcr(new \DateTime());
                            $em = $this->getDoctrine()->getManager();
                            $em->persist($check);
                            $em->flush();
                            
                        }
                        if(count($nombreCheck)==4)
                        {
                            $nomPrenomClient = $currentcoupon->getClient();
                            $nomPartenaire = $currentcoupon->getCommand()->getReference()->getAnnexe()->getProtocol()->getUser();
                            $messageMail = \Swift_Message::newInstance()
                                ->setSubject(' ' . $nomPrenomClient . ', notez ' . $nomPartenaire . ' et obtenez 20 BIGFid' )
                                ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                                ->setTo($currentcoupon->getCommand()->getClient()->getEmail())
                                ->setBody($this->renderView('MainFrontBundle:Email:enqueteSatisfaction.html.twig', array("client" => $nomPrenomClient, "partenaire" => $nomPartenaire, "deal" => $currentcoupon->getCommand()->getDeal(),'defaultregion' =>"Grand tunis")));
                            $messageMail->setContentType("text/html");
                            $this->get('mailer')->send($messageMail);
                            $currentcoupon->setRecu(2);
                            $em = $this->getDoctrine()->getManager();
                            $em->persist($currentcoupon);
                            $em->flush();
                            /*ajouter dernier check-----------*/
                            $check = new Checkc();
                            $check->setCoupon($currentcoupon);
                            $check->setDcr(new \DateTime());
                            $em = $this->getDoctrine()->getManager();
                            $em->persist($check);
                            $em->flush();
                        }

                    }
                    else if($user->getId()==475) 
                    {
                        $nombreCheck = $this->getDoctrine()->getRepository('BackCommandeBundle:Checkc')->findBy(array("coupon" => $currentcoupon->getId()));
                        
                        if(count($nombreCheck)<5)
                        {
                            /* $return_success = json_encode($messages['success']);
                            return new Response($return_success, 200, array('Content-Type' => $type));
                            exit; */
                            $check = new Checkc();
                            $check->setCoupon($currentcoupon);
                            $check->setDcr(new \DateTime());
                            $em = $this->getDoctrine()->getManager();
                            $em->persist($check);
                            $em->flush();
                            
                        }
                        if(count($nombreCheck)==5)
                        {
                            $nomPrenomClient = $currentcoupon->getClient();
                            $nomPartenaire = $currentcoupon->getCommand()->getReference()->getAnnexe()->getProtocol()->getUser();
                            $messageMail = \Swift_Message::newInstance()
                                ->setSubject(' ' . $nomPrenomClient . ', notez ' . $nomPartenaire . ' et obtenez 20 BIGFid' )
                                ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                                ->setTo($currentcoupon->getCommand()->getClient()->getEmail())
                                ->setBody($this->renderView('MainFrontBundle:Email:enqueteSatisfaction.html.twig', array("client" => $nomPrenomClient, "partenaire" => $nomPartenaire, "deal" => $currentcoupon->getCommand()->getDeal(),'defaultregion' =>"Grand tunis")));
                            $messageMail->setContentType("text/html");
                            $this->get('mailer')->send($messageMail);
                            $currentcoupon->setRecu(2);
                            $em = $this->getDoctrine()->getManager();
                            $em->persist($currentcoupon);
                            $em->flush();
                            /*ajouter dernier check-----------*/
                            $check = new Checkc();
                            $check->setCoupon($currentcoupon);
                            $check->setDcr(new \DateTime());
                            $em = $this->getDoctrine()->getManager();
                            $em->persist($check);
                            $em->flush();
                        }

                    }
                    else
                    {
                        /*--------send mail enquette de satisfaction --------*/
                        $nomPrenomClient = $currentcoupon->getClient();
                        $nomPartenaire = $currentcoupon->getCommand()->getReference()->getAnnexe()->getProtocol()->getUser();
                        $messageMail = \Swift_Message::newInstance()
                            ->setSubject(' ' . $nomPrenomClient . ', notez ' . $nomPartenaire . ' et obtenez 20 BIGFid' )
                            ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                            ->setTo($currentcoupon->getCommand()->getClient()->getEmail())
                            ->setBody($this->renderView('MainFrontBundle:Email:enqueteSatisfaction.html.twig', array("client" => $nomPrenomClient, "partenaire" => $nomPartenaire, "deal" => $currentcoupon->getCommand()->getDeal(),'defaultregion' =>"Grand tunis")));
                        $messageMail->setContentType("text/html");
                        $this->get('mailer')->send($messageMail);
                        $currentcoupon->setRecu(2);
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($currentcoupon);
                        $em->flush();

                        /*ajouter  check-----------*/
                        $check = new Checkc();
                        $check->setCoupon($currentcoupon);
                        $check->setDcr(new \DateTime());
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($check);
                        $em->flush();
                    }

                }
            }
            $return_success = json_encode($messages['success']);
            return new Response($return_success, 200, array('Content-Type' => $type));
        }
    }

    public function partnerAction($iduser, $key) {
        $messages = array(
            'success' => array(
                'success' => true,
                'message' => 'VALID_USER'
            ),
            'fail' => array(
                'success' => false,
                'message' => 'INVALID_USER'
            ),
            'secret' => array(
                'success' => false,
                'message' => 'INVALID_AUTH'
            )
        );
        $type = 'application/json';

        $return_fail = json_encode($messages['fail']);
        $return_secret = json_encode($messages['secret']);
        if ($this->container->getParameter('secret') !== $key) {
            return new Response($return_secret, 200, array('Content-Type' => $type));
        }
        //check user
        $user = $this->getDoctrine()->getRepository('UserUserBundle:User')->find($iduser);
        if ($user == null) {
            return new Response($return_fail, 200, array('Content-Type' => $type));
        } else if (!in_array('PARTENAIRE', $user->getRoles())) {
            return new Response($return_fail, 200, array('Content-Type' => $type));
        } else if ($user->isEnabled() == 0) {
            return new Response($return_fail, 200, array('Content-Type' => $type));
        } else {
            $contactpartner = $user->getContactpartner();
            $contact = null;
            foreach ($contactpartner as $value) {
                if ($value->getPrincipale() == 1) {
                    $contact = $value;
                }
            }
            $partner = array(
                'company' => $user->getName(),
                'adresse' => $user->getAddress(),
                'tel' => $user->getPhone(),
            );
            if ($contact != null) {
                $partner['name'] = $contact->getFirstname() . " " . $contact->getLastname();
            }
            // récupération des deal
            $protocol = $user->getProtocol();
            $deal = array();
            //foreach ($protocol as $value) {
            //   $annex = $value->getAnnexe();
            //foreach ($annex as $valannex) {
            $deals = $this->getDoctrine()->getRepository('BackPartnerBundle:Invoice')->getDealByUser($iduser);
            //$deals = $valannex->getPlanning()->getDeal();
            foreach ($deals as $value) {
                if ($value != null) {
                    $deal[] = array('id' => $value->getId(),
                        'title' => $value->getTitle(),
                        'nbcv' => 0,
                        'nbcr' => 0,
                        'nbcf' => 0,
                        'quota' => $value->getPlanning()->getDefaultannexe()->getQuota()
                        
                    );
                }
            }
            //}
            //  }
            foreach ($deal as $key => $value) {
                $currentdeal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->find($value['id']);
                $command = $this->getDoctrine()->getRepository('BackCommandeBundle:Command')->findBy(array('deal' => $currentdeal, 'etat' => 1));
                $nbcv = 0;
                $nbcr = 0;
                $nbcf = 0;
                foreach ($command as $vcommand) {//echo$vcommand->getId()."<br>";
                    foreach ($vcommand->getCoupon() as $vcoupon) {
                        if ($vcoupon->getVendu() == 2 or $vcoupon->getVendu() == 3) {
                            ++$nbcv;
                        }
                        if ($vcoupon->getRecu() == 2) {
                            ++$nbcr;
                        }
                        if ($vcoupon->getRecu() == 3) {
                            ++$nbcf;
                        }
                    }
                }
                $deal[$key]['nbcv'] = $nbcv;
                $deal[$key]['nbcr'] = $nbcr;
                $deal[$key]['nbcf'] = $nbcf;
                $quota_reel = $deal[$key]['quota'];
                if ($quota_reel == 1){
                    $deal[$key]['quota'] = $nbcv;
                }else if ($quota_reel != $nbcv){
                    $deal[$key]['quota'] =$quota_reel ;
                }
            }
            $messages['success']['partner'] = $partner;
            $messages['success']['deals'] = $deal;

            $return_success = json_encode($messages['success']);
            return new Response($return_success, 200, array('Content-Type' => $type));
        }
    }

    public function dealAction($iduser, $key) {
        $messages = array(
            'success' => array(
                'success' => true,
                'message' => 'VALID_USER'
            ),
            'fail' => array(
                'success' => false,
                'message' => 'INVALID_USER'
            ),
            'secret' => array(
                'success' => false,
                'message' => 'INVALID_AUTH'
            )
        );
        $type = 'application/json';

        $return_fail = json_encode($messages['fail']);
        $return_secret = json_encode($messages['secret']);
        if ($this->container->getParameter('secret') !== $key) {
            return new Response($return_secret, 200, array('Content-Type' => $type));
        }
        //check user
        $user = $this->getDoctrine()->getRepository('UserUserBundle:User')->find($iduser);


        if ($user == null) {
            return new Response($return_fail, 200, array('Content-Type' => $type));
        } else if (!in_array('PARTENAIRE', $user->getRoles())) {
            return new Response($return_fail, 200, array('Content-Type' => $type));
        } else if ($user->isEnabled() == 0) {
            return new Response($return_fail, 200, array('Content-Type' => $type));
        } else {
            $dealx = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getdealrest();
            $deal2 = $dealx;
            foreach ($deal2 as $key => $value) {
                $userc = $value->getPlanning()->getDefaultannexe()->getProtocol()->getUser();
                if ($userc->getId() != $user->getId()) {
                    unset($dealx[$key]);
                }
            }
            foreach ($dealx as $value) {
                $deal[] = array('id' => $value->getId(),
                    'title' => $value->getTitle(),
                    'nbcv' => 0,
                    'nbcr' => 0,
                    'quota' => $value->getPlanning()->getDefaultannexe()->getQuota()
                );
            }

            foreach ($deal as $key => $value) {
                $currentdeal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->find($value['id']);
                $command = $this->getDoctrine()->getRepository('BackCommandeBundle:Command')->findBy(array('deal' => $currentdeal, 'etat' => 1));
                $nbcv = 0;
                $nbcr = 0;
                foreach ($command as $vcommand) {//echo$vcommand->getId()."<br>";
                    foreach ($vcommand->getCoupon() as $vcoupon) {
                        if ($vcoupon->getVendu() == 2) {
                            ++$nbcv;
                        }
                        if ($vcoupon->getRecu() == 2) {
                            ++$nbcr;
                        }
                    }
                }
                $deal[$key]['nbcv'] = $nbcv;
                $deal[$key]['nbcr'] = $nbcr;
            }

            $messages['success']['deals'] = $deal;

            $return_success = json_encode($messages['success']);
            return new Response($return_success, 200, array('Content-Type' => $type));
        }
    }

    public function demandeAction($iduser, $iddeal, $key) {
        $messages = array(
            'success' => array(
                'success' => true,
                'message' => 'EMAIL_SEND'
            ),
            'fail' => array(
                'success' => false,
                'message' => 'INVALID_USER'
            ),
            'secret' => array(
                'success' => false,
                'message' => 'INVALID_AUTH'
            )
        );
        $type = 'application/json';
        $return_fail = json_encode($messages['success']);

        // Ensure this is from the Android application.
        if ($this->container->getParameter('secret') !== $key) {
            return new Response($return_secret, 200, array('Content-Type' => $type));
        }

        //check user
        $user = $this->getDoctrine()->getRepository('UserUserBundle:User')->find($iduser);
        $user_name = $user->getName();

        if ($user == null) {
            return new Response($return_fail, 200, array('Content-Type' => $type));
        } else {
            // get Deal
            $deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->find($iddeal);
            $deal_title = $deal->getTitle();
            $em = $this->getDoctrine()->getManager();
            /* -------------------------------------Notification----------------------------------------------------------------- */

            $listUserForNotif = Constant\NotifUser::getDemandePaiement();
            $libelleNotif = "Le partenaire " . $user_name . " demande un paiement pour le deal " . $deal_title;
            $lient = $this->generateUrl('back_invoice');
            $icone = "icon-usd";
            for ($count = 1; $count <= count($listUserForNotif); $count++) {
                $query = $this->getDoctrine()->getEntityManager()
                                ->createQuery(
                                        'SELECT u FROM UserUserBundle:User u WHERE u.roles LIKE :role'
                                )->setParameter('role', '%"' . $listUserForNotif[$count] . '"%');

                $listUser = $query->getResult();
                foreach ($listUser as $value) {
                    $notification = new Notification();
                    $notification->setUser($this->getDoctrine()->getRepository("UserUserBundle:User")->find($value->getId()));
                    $notification->setName($libelleNotif);
                    $notification->setLien($lient);
                    $notification->setIcone($icone);
                    $em->persist($notification);
                    $em->flush();
                }
                unset($listUser);
            }

            /* -------------------------------------Fin Notification----------------------------------------------------------------- */
        }

        $user_admin = $user = $this->getDoctrine()->getRepository('UserUserBundle:User')->findByRole('ROLE_SUPER_ADMIN');
        $admin = $user_admin[0];
        /* -------------------------------------Envoi Mail Admin----------------------------------------------------------------- */

        $message = \Swift_Message::newInstance()
                ->setSubject('Demande de paiement')
                ->setFrom(array('paiement@bigdeal.tn' => 'Bigdeal.tn'))
                ->setTo($admin->getEmail())
                ->setBody($this->renderView('MainFrontBundle:Email:demandePaiement.html.twig', array("name" => $user_name, "title" => $deal_title)));
        $message->setContentType("text/html");
        $this->get('mailer')->send($message);
        /* -------------------------------------Envoi Mail----------------------------------------------------------------- */
        $user_DAF = $user = $this->getDoctrine()->getRepository('UserUserBundle:User')->findByRole('DAF');
        $daf = $user_DAF[0];
        /* -------------------------------------Envoi Mail DAF----------------------------------------------------------------- */

        $message = \Swift_Message::newInstance()
                ->setSubject('Demande de paiement')
                ->setFrom(array('paiement@bigdeal.tn' => 'Bigdeal.tn'))
                
                ->setTo($daf->getEmail())
                ->setBody($this->renderView('MainFrontBundle:Email:demandePaiement.html.twig', array("name" => $user_name, "title" => $deal_title)));
        $message->setContentType("text/html");
        $this->get('mailer')->send($message);
        /* -------------------------------------Envoi Mail----------------------------------------------------------------- */

        $user_FINANCIER = $user = $this->getDoctrine()->getRepository('UserUserBundle:User')->findByRole('FINANCIER');
        foreach ($user_FINANCIER as $value) {
            $FINANCIER = $value;
            /* -------------------------------------Envoi Mail FINANCIER----------------------------------------------------------------- */

            $message = \Swift_Message::newInstance()
                    ->setSubject('Demande de paiement')
                    ->setFrom(array('paiement@bigdeal.tn' => 'Bigdeal.tn'))
                    ->setTo($FINANCIER->getEmail())
                    ->setBody($this->renderView('MainFrontBundle:Email:demandePaiement.html.twig', array("name" => $user_name, "title" => $deal_title)));
            $message->setContentType("text/html");
            $this->get('mailer')->send($message);
            /* -------------------------------------Envoi Mail----------------------------------------------------------------- */
        }
        $return_success = json_encode($messages['success']);
        return new Response($return_fail, 200, array('Content-Type' => $type));
    }

    public function indexAction($email, $pwd, $key) {
        $messages = array(
            'success' => array(
                'success' => true,
                'message' => 'VALID_LOGIN'
            ),
            'fail' => array(
                'success' => false,
                'message' => 'INVALID_LOGIN'
            ),
            'secret' => array(
                'success' => false,
                'message' => 'INVALID_AUTH'
            )
        );

        $type = 'application/json';

        $return_fail = json_encode($messages['fail']);
        $return_secret = json_encode($messages['secret']);
        // Ensure this is from the Android application.
        if ($this->container->getParameter('secret') !== $key) {
            return new Response($return_secret, 200, array('Content-Type' => $type));
        }
        $user = $this->get('fos_user.user_manager')->findUserByEmail($email);
        //echo count($user);exit;
        if (null === $user) {
            return new Response($return_fail, 200, array('Content-Type' => $type));
        }

        // Email passed. Let's encode the password sent to us using the user's salt.
        $encoder = $this->get('security.encoder_factory')->getEncoder($user);
        $encoded_pass = $encoder->encodePassword($pwd, $user->getSalt());

        // Check if the password sent to us matches encoded_pass we just created.
        if ($encoded_pass === $user->getPassword()) {
            // Passed!
            $messages['success']['iduser'] = $user->getId();

            $return_success = json_encode($messages['success']);
            return new Response($return_success, 200, array('Content-Type' => $type));
        }

        // Failed!
        return new Response($return_fail, 200, array('Content-Type' => $type));
    }

}
