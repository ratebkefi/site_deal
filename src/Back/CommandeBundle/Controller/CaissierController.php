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
use Back\CommandeBundle\Form\CaissieraddType;
use FOS\UserBundle\Event\FormEvent;
use Back\DashBundle\Common\Tools;
use Back\CommandeBundle\Entity\Caisse;
use Back\CommandeBundle\Form\CaissierFilterType;
use Back\CommandeBundle\Form\CaisseFilterType;
use User\UserBundle\Form\UserFilterType;

class CaissierController extends Controller
{
    public function viewAction(User $user)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des caissier", $this->generateUrl("list_caissier"), array());
        $breadcrumbs->addItem("Afficher  caissier", "view_caissier", array());
        return $this->render('BackCommandeBundle:Caissier:show.html.twig', array('entity' => $user));
    }

    public function caisseAction(Request $request)
    {

        $curentUser = $this->get('security.context')->getToken()->getUser();
        $roles = $this->get('security.context')->getToken()->getUser()->getRoles();
        $currentCaisse = $this->get('security.context')->getToken()->getUser()->getCaisse();
        /*
         * filtre de recheche
         */
        $request->get('request');
        $form = $this->createForm(new CaisseFilterType());
        //Tools::dump($request->query,true);
        $data=$request->query->get('back_commandebundle_caissefilter');


        $data['etat'] = 1;
        if (in_array("ROLE_SUPER_ADMIN", $roles) || in_array("RESPONSABLECAISSE", $roles)) {
           // echo $data['paypar'];
            //RESPONSABLECAISSIER

            if(isset($data['paypar']))
            {
                $casseSelectionner = $this->getDoctrine()
                    ->getRepository('BackCommandeBundle:Caisse')
                    ->find($data['paypar']);
                $caisse = $this->getDoctrine()
                    ->getRepository('BackCommandeBundle:Caisse')
                    ->findBy(array('user' => $casseSelectionner->getUser()));

            }
            else
            {
                $caisse = $this->getDoctrine()
                    ->getRepository('BackCommandeBundle:Caisse')
                    ->findAll();
            }

        }else{
            $data['paypar']=$currentCaisse->getId();
            $caisse = $this->getDoctrine()
                ->getRepository('BackCommandeBundle:Caisse')
                ->findBy(array('user' => $curentUser));
        }
        $form->bind($request);

        $commande = $this->getDoctrine()->getRepository('BackCommandeBundle:Caisse')->getListCmdCaisse($data);


        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $commande, $request->query->get('page', 1), 25
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Ma caisse", "view_caissier", array());
        return $this->render('BackCommandeBundle:Caissier:caisse.html.twig', array('entities' => $commande, 'pagination' => $pagination, 'caisse' => $caisse,'form' => $form->createView()));
    }

    public function indexAction()
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des caissier", $this->generateUrl("list_caissier"), array());
        $request = $this->get('request');
        $form = $this->createForm(new CaissierFilterType());
        $form->bind($request);
        $data=$request->query->get('back_commandebundle_caissierfilter');
        $user=$this->get('security.context')->getToken()->getUser();
        $Roles=$user->getRoles();
       // echo $Roles[0];exit;
        $data=Tools::dropNull($data);

            $data['roles']=array("CAISSIER");
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->findBy($data);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $partner,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('BackCommandeBundle:Caissier:index.html.twig', array(
            'form' => $form->createView(),
            'entities' => $partner,
            'pagination' => $pagination
            ));
    }

    public function editAction($id)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des caissier", $this->generateUrl("list_caissier"), array());
        $breadcrumbs->addItem("Modifier caissier", "edit_caissier", array());
        $request = $this->get('request');
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:USer')
            ->find($id);
        $caisse = $this->getDoctrine()->getRepository("BackCommandeBundle:Caisse")->find($partner->getCaisse());
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new CaissieraddType(), $partner);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();
            //$caisse = $this->getDoctrine()->getRepository("BackCommandeBundle:Caisse")->find($partner->getCaisse());
            $caisse->setLibelle($request->request->get('nomecaisse'));
            $caisse->setLatitude($request->request->get('latitude'));
            $caisse->setLongitude($request->request->get('longitude'));
            $caisse->setAdresse($request->request->get('adresse'));
            $caisse->setHoraire($request->request->get('horaire'));
            $caisse->setTel($request->request->get('tel'));
            $em->persist($caisse);
            $em->flush();
           // var_dump($request); exit;
            return $this->redirect($this->generateUrl('list_caissier'));
        }
        return $this->render('BackCommandeBundle:Caissier:edit.html.twig', array('form' => $form->createView(), 'partner' => $partner,'caisse'=>$caisse)
        );
    }

    public function addAction(Request $request)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des caissier", $this->generateUrl("list_caissier"), array());
        $breadcrumbs->addItem("Ajouter  caissier", "add_caissier", array());
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this->createForm(new CaissieraddType(), $user);
        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {
                $userManager = $this->container->get('fos_user.user_manager');
                $event = new FormEvent($form, $request);
                $om = $this->container->get('doctrine.orm.entity_manager');
                $newpassword = Tools::randomPassword();
                $user->setPlainPassword($newpassword);
                $user->setRoles(array('CAISSIER' => 'CAISSIER'));
                $user->setEnabled(true);

                $user->setUsername($user->getEmail());
                $em = $this->getDoctrine()->getManager();
                $userManager->createUser($user);

                $om->persist($user);
                $om->flush();
                $caisse = new Caisse();
                $caisse->setUser($user);
                $caisse->setDateUpdate(new \DateTime());
                $caisse->setMontantCheque(0);
                $caisse->setLibelle($request->request->get('nomecaisse'));
                $caisse->setLatitude($request->request->get('latitude'));
                $caisse->setLongitude($request->request->get('longitude'));
                $caisse->setAdresse($request->request->get('adresse'));
                $caisse->setHoraire($request->request->get('horaire'));
                $caisse->setTel($request->request->get('tel'));
                $caisse->setMontantEspece(0);
                $caisse->setAfficher(1);
                $em->persist($caisse);
                $em->flush();

                return $this->redirect($this->generateUrl('list_caissier'));
            } else {
                //echo $form->getErrors();
            }
        }
        return $this->render('BackCommandeBundle:Caissier:add.html.twig', array('form' => $form->createView(),));
    }

    public function schowAction(User $user)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des caissier", $this->generateUrl("list_caissier"), array());
        $breadcrumbs->addItem("Afficher  caissier", "show_caissier", array());
        return $this->render('BackCommandeBundle:Caissier:show.html.twig', array('entity' => $user,));
    }

}