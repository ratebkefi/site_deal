<?php
/**
 * Created by PhpStorm.
 * User: G50
 * Date: 04/03/2015
 * Time: 15:24
 */

namespace Back\CommandeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use User\UserBundle\Entity\User;
use Back\CommandeBundle\Form\ResponsableCaissieraddType;
use FOS\UserBundle\Event\FormEvent;
use Back\DashBundle\Common\Tools;
use Back\CommandeBundle\Entity\Caisse;
use Back\CommandeBundle\Form\ResponsableCaisseFilterType;
use User\UserBundle\Form\UserFilterType;
use Back\CommandeBundle\Form\RetraitType;
use Back\CommandeBundle\Entity\Operation;
use Back\DashBundle\Constant;
use Back\DashBundle\Entity\Notification;

class ResponsableCaissierController extends Controller
{
    public function viewAction(User $user)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des responsable caisse", $this->generateUrl("list_responsablecaissier"), array());
        $breadcrumbs->addItem("Afficher un responsable caisse", "show_responsablecaissier", array());
        return $this->render('BackCommandeBundle:ResponsableCaissier:show.html.twig', array('entity' => $user));
    }

    public function indexAction()
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des responsable caisse", $this->generateUrl("list_responsablecaissier"), array());
        $request = $this->get('request');
        $form = $this->createForm(new ResponsableCaisseFilterType());
        $form->bind($request);
        $data = $request->query->get('back_commandebundle_responsablecaissefilter');
        $data = Tools::dropNull($data);
        $data['roles'] = "RESPONSABLECAISSE";
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->findBy($data);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $partner,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('BackCommandeBundle:ResponsableCaissier:index.html.twig', array('form' => $form->createView(), 'entities' => $partner, 'pagination' => $pagination,));
    }

    public function editAction($id)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des responsable caisse", $this->generateUrl("list_responsablecaissier"), array());
        $breadcrumbs->addItem("Modifier responsable caisse", "edit_responsablecaissier", array());
        $request = $this->get('request');
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:USer')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new ResponsableCaissieraddType(), $partner);
        $form->handleRequest($request);

        if ($form->isValid()) {

if(!$partner->getCaisse())
{
//Ajouter une caisse
    $caisse = new Caisse();
    $caisse->setUser($partner);
    $caisse->setDateUpdate(new \DateTime());
    $caisse->setMontantCheque(0);
    $caisse->setLibelle(null);
    $caisse->setLatitude(null);
    $caisse->setLongitude(null);
    $caisse->setAdresse(null);
    $caisse->setHoraire(null);
    $caisse->setTel(null);
    $caisse->setMontantEspece(0);
    $caisse->setAfficher(0);
    $em->persist($caisse);
    $em->flush();
}

            $em->flush();
            $this->get('session')->getFlashBag()->set('error', 'Elément enregistré avec succès');

            return $this->redirect($this->generateUrl('list_responsablecaissier'));
        }
        return $this->render('BackCommandeBundle:ResponsableCaissier:edit.html.twig', array('form' => $form->createView(), 'partner' => $partner)
        );
    }

    public function historiqueRespAction($id)
    {
        $resp = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($id);
        $request = $this->get('request');

        $operation = $this->getDoctrine()
            ->getRepository('BackCommandeBundle:Operation')
            ->findBy(array("user"=>$resp),array("dcr"=>"DESC"));

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $operation,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('BackCommandeBundle:ResponsableCaissier:historique.html.twig', array('resp'=>$resp, 'entities' => $operation, 'pagination' => $pagination,));
    }

    public function historiqueAction()
    {
		$roles = $this->get('security.context')->getToken()->getUser()->getRoles();

        $request = $this->get('request');
		if (in_array("ROLE_SUPER_ADMIN", $roles) || in_array("DAF", $roles)) {
		$resp = NULL;
		 $operation = $this->getDoctrine()
            ->getRepository('BackCommandeBundle:Operation')
            ->findAll(array(),array("dcr"=>"DESC"));
		}
		else
		{
		$resp = $this->get('security.context')->getToken()->getUser();

        $operation = $this->getDoctrine()
            ->getRepository('BackCommandeBundle:Operation')
            ->findBy(array("user"=>$resp),array("dcr"=>"DESC"));
		}
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $operation,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('BackCommandeBundle:ResponsableCaissier:historique.html.twig', array('resp'=>$resp, 'entities' => $operation, 'pagination' => $pagination,));

    }

    public function addAction(Request $request)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des responsable caisse", $this->generateUrl("list_responsablecaissier"), array());
        $breadcrumbs->addItem("Ajouter responsable caisse", "add_responsablecaissier", array());
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this->createForm(new ResponsableCaissieraddType(), $user);
        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {
                $userManager = $this->container->get('fos_user.user_manager');
                $event = new FormEvent($form, $request);
                $om = $this->container->get('doctrine.orm.entity_manager');
                $newpassword = Tools::randomPassword();
                $user->setPlainPassword($newpassword);
                $user->setRoles(array('RESPONSABLECAISSE' => 'RESPONSABLECAISSE'));
                $user->setEnabled(true);
                $user->setUsername($user->getEmail());
                $em = $this->getDoctrine()->getManager();
                $userManager->createUser($user);

                $om->persist($user);
                $om->flush();
                //Ajouter une caisse
                $caisse = new Caisse();
                $caisse->setUser($user);
                $caisse->setDateUpdate(new \DateTime());
                $caisse->setMontantCheque(0);
                $caisse->setLibelle(null);
                $caisse->setLatitude(null);
                $caisse->setLongitude(null);
                $caisse->setAdresse(null);
                $caisse->setHoraire(null);
                $caisse->setTel(null);
                $caisse->setMontantEspece(0);
                $caisse->setAfficher(0);
                $em->persist($caisse);
                $em->flush();

                $this->get('session')->getFlashBag()->set('error', 'Elément enregistré avec succès');

                return $this->redirect($this->generateUrl('list_responsablecaissier'));
            } else {
                //echo $form->getErrors();
            }
        }
        return $this->render('BackCommandeBundle:ResponsableCaissier:add.html.twig', array('form' => $form->createView(),));
    }

    public function schowAction(User $user)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des responsable caisse", $this->generateUrl("list_responsablecaissier"), array());
        $breadcrumbs->addItem("Afficher responsable caisse", "showw_responsablecaissier", array());
        return $this->render('BackCommandeBundle:ResponsableCaissier:show.html.twig', array('entity' => $user,));
    }

    public function retraitAction($id, Request $request)
    {

        $request = $this->get('request');
        $montantEspeces = 0;
        $montantCheques = 0;
        $modePayement = $this->getDoctrine()
            ->getRepository('BackCommandeBundle:PaymentMethod')
            ->getListMethode();
        $utilisateur = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($id);
        $user = $this->getDoctrine()
            ->getRepository('BackCommandeBundle:Caisse')
            ->findBy(array("user"=>$id));

        foreach($user as $value)
        {
            $montantEspeces = $value->getMontantEspece();
            $montantCheques = $value->getMontantCheque();
        }

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new RetraitType(), $user);
        $form->handleRequest($request);
       // if ($request->getMethod() == 'POST') {

        if ($montantEspeces + $montantCheques > 0) {

                $mode = array(1,2);
                //$espece = $request->request->get('espece');
                $caisse = $utilisateur->getCaisse();
            //perssiste caisse

                for ($count = 0; $count < count($mode); $count++) {
                    if ($mode[$count] == 1) {
                        if ($montantEspeces > 0) {
                            //update caisse reponsable caisse
                            $caisseResp = $this->get('security.context')->getToken()->getUser()->getCaisse();
                            //perssiste caisse
                            $caisseResp->setDateUpdate(new \DateTime());
                            $caisseResp->setMontantEspece($caisseResp->getMontantEspece() + $montantEspeces);
                            $em->persist($caisseResp);
                            $em->flush();

                            //update caisse caissier
                            $caisse->setDateUpdate(new \DateTime());
                            $caisse->setMontantEspece(0);
                            $em->persist($caisse);
                            $em->flush();
                            //update operation
                            $modePayement = $this->getDoctrine()
                                ->getRepository('BackCommandeBundle:PaymentMethod')
                                ->find($mode[$count]);
                            $operation = new Operation();
                            $operation->setModepayement($modePayement);
                            $operation->setType(2);
                            $operation->setMontant($montantEspeces);
                            $operation->setUser($user = $this->get('security.context')->getToken()->getUser());
                            $operation->setCaisse($utilisateur);

                            $em->persist($operation);
                            $em->flush();
                        }
                    } if ($mode[$count] == 2) {
                        if ($montantCheques > 0) {
                            //update caisse reponsable caisse en cas de cheque
                            $caisseResp = $this->get('security.context')->getToken()->getUser()->getCaisse();
                            //perssiste caisse
                            $caisseResp->setDateUpdate(new \DateTime());
                            $caisseResp->setMontantCheque($caisseResp->getMontantCheque() + $montantCheques);

                            $em->persist($caisseResp);
                            $em->flush();

                            //update caisse caissier en cas de cheque
                            $caisse->setDateUpdate(new \DateTime());
                            $caisse->setMontantCheque(0);
                            $em->persist($caisse);
                            $em->flush();
                            //update operation
                            $modePayement = $this->getDoctrine()
                                ->getRepository('BackCommandeBundle:PaymentMethod')
                                ->find($mode[$count]);

                                $operation = new Operation();
                                $operation->setModepayement($modePayement);
                                $operation->setType(2);
                                $operation->setMontant($montantCheques);
                                $operation->setTitulaire(null);
                                $operation->setNumCheque(null);
                                 $operation->setUser($user = $this->get('security.context')->getToken()->getUser());
                                $operation->setCaisse($utilisateur);

                                $em->persist($operation);
                                $em->flush();


                        }
                    }
                }
            $totalSomme = $montantEspeces + $montantCheques;
            /*-------------------------------------Notification-----------------------------------------------------------------*/

            $listUserForNotif = Constant\NotifUser::getCreateFacture();
            $libelleNotif = "Le responsable de caisse " . $this->get('security.context')->getToken()->getUser()->getName()." a effectué un retrait d’un total de " .$totalSomme ." DT de la caisse ". $caisse->getLibelle() ." le ".$caisse->getDateUpdate()->format('d-m-Y H:i:s') ;
            $lient = $this->generateUrl('historique_responsablecaissier_manager', array('id'=>$this->getUser()->getId()));
            $icone = "icon-dollar";
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
                $this->get('session')->getFlashBag()->set('alert-success', 'Le montant a été retiré avec succès!');

                return $this->redirect($this->generateUrl('list_caissier'));

        } else {
            $this->get('session')->getFlashBag()->set('alert-error', 'La caisse est vide!');

            return $this->redirect($this->generateUrl('list_caissier'));
        }
       /* }
        return $this->render('BackCommandeBundle:ResponsableCaissier:retrait.html.twig', array('form' => $form->createView(),  "modepayement" => $modePayement,  "id" => $id));
       */

    }

}