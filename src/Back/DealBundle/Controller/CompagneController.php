<?php

namespace Back\DealBundle\Controller;

use Back\DealBundle\Form\RegionFilterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\DealBundle\Entity\Compagne;
use Back\PlanningBundle\Entity\Region;
use Back\DealBundle\Form\CompagneType;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * Compagne controller.
 *
 */
class CompagneController extends Controller
{

    /**
     * Lists all Compagne entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BackDealBundle:Compagne')->findAll();

        return $this->render('BackDealBundle:Compagne:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Compagne entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Compagne();
        $form = $this->createCreateFinalForm($entity);
        $form_region   = $this->createRegionForm();
        $form->handleRequest($request);

        if ($form->isValid()) {

           // $em->persist($entity);
           // $em->flush();

            return $this->render('BackDealBundle:Compagne:shownew.html.twig', array(
                'form'   => $form->createView(),
            ));
        }

        return $this->render('BackDealBundle:Compagne:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'form_region'   => $form_region->createView(),
        ));
    }




    /**
     * Creates a new Compagne entity.
     *
     */
    public function createFinalAction(Request $request)
    {
        $entity = new Compagne();
        $form = $this->createCreateFinalForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $user = $this->getUser();
            $user=$this->get('security.context')->getToken()->getUser();

            $entity->setCreatedby($user->getName());
            $entity->setUpdatedby($user->getName());
            $entity->setDatecreated(new \DateTime());
            $entity->setDateupdated(new \DateTime());
            $em = $this->getDoctrine()->getManager();

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('dash_compagnes'));
        }

        return $this->redirect($this->genreateerateUrl('dash_compagnes'));
    }










    /**
     * Creates a form to create a Compagne entity.
     *
     * @param Compagne $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Compagne $entity,$idr)
    {





        if($idr==0)
        {
            $em = $this->getDoctrine()->getManager();
            $form = $this->createForm(new CompagneType(array("em" =>$this-> getDoctrine()->getRepository('BackDealBundle:Deal')->getdealrest())), $entity, array(
                'action' => $this->generateUrl('compagne_create'),
                'method' => 'POST',
            ));
        }
        else
        {
            $em = $this->getDoctrine()->getManager();
            $region = $em->getRepository('BackPlanningBundle:Region')->find($idr);
            $form = $this->createForm(new CompagneType(array("em" =>$this-> getDoctrine()->getRepository('BackDealBundle:Deal')->listByRegion($region) )), $entity, array(
                'action' => $this->generateUrl('compagne_create'),
                'method' => 'POST',
            ));
        }







        $form->add('submit', 'submit', array('label' => 'Générer', 'attr' => array('class' => 'btn btn-success')));

        return $form;
    }


    /**
     * Creates a form to create a Compagne entity.
     *
     * @param Compagne $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateFinalForm(Compagne $entity)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new CompagneType(array("em" =>$entity )), $entity, array(
            'action' => $this->generateUrl('compagne_createf'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer', 'attr' => array('class' => 'btn btn-success span12')));

        return $form;
    }


    /**
     * Creates a form to create a Compagne entity.
     *
     * @param Compagne $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createRegionForm()
    {

        $form = $this->createForm(new RegionFilterType(), array(
            'action' => $this->generateUrl('compagne_new'),
            'method' => 'POST',
        ));


        return $form;
    }










    /**
     * Displays a form to create a new Compagne entity.
     *
     */
    public function newAction($idr)
    {
        $entity = new Compagne();

        $form   = $this->createCreateForm($entity,$idr);
        $form_region   = $this->createRegionForm();

        return $this->render('BackDealBundle:Compagne:new.html.twig', array(
            'entity' => $entity,
            'edit_form'   => $form->createView(),
            'form_region'   => $form_region->createView(),
            'entity' => $entity,
            'idr' => $idr,


        ));
    }








    /**
     * Finds and displays a Compagne entity.
     *
     */
    public function showAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackDealBundle:Compagne')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Compagne entity.');
        }
        $form_region   = $this->createRegionForm();
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackDealBundle:Compagne:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'form_region' => $form_region->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Compagne entity.
     *
     */
    public function editAction($id,$idr)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackDealBundle:Compagne')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Compagne entity.');
        }

        $editForm = $this->createEditForm($entity,$idr);
        $form_region   = $this->createRegionForm();
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackDealBundle:Compagne:edit.html.twig', array(
            'entity'      => $entity,
            'idr'      => $idr,
            'edit_form'   => $editForm->createView(),
            'form_region'   => $form_region->createView(),
            'delete_form' => $deleteForm->createView(),
        ));

    }


    public function compAction($page)
    {


        if ($page < 1) {
            throw $this->createNotFoundException("La pages ".$page." n'existe pas.");
        }

        // Ici je fixe le nombre d'annonces par page à 3
        // Mais bien sûr il faudrait utiliser un paramètre, et y accéder via $this->container->getParameter('nb_per_page')
        $nbPerPage = 8;

        // On récupère notre objet Paginator
        $listPagComp = $this->getDoctrine()
            ->getManager()
            ->getRepository('BackDealBundle:Compagne')
            ->getComp($page, $nbPerPage)
        ;

        // On calcule le nombre total de pages grâce au count($listAdverts) qui retourne le nombre total d'annonces
        $nbPages = ceil(count($listPagComp)/$nbPerPage);

        // Si la page n'existe pas, on retourne une 404

        // On donne toutes les informations nécessaires à la vue
        return $this->render('BackDealBundle:Compagne:index.html.twig', array(
            'entities' => $listPagComp,
            'nbPages'     => $nbPages,
            'page'        => $page
        ));
    }


    /**
    * Creates a form to edit a Compagne entity.
    *
    * @param Compagne $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Compagne $entity,$idr)
    {

        if($idr==0)
        {
            $em = $this->getDoctrine()->getManager();


            $form = $this->createForm(new CompagneType(array("em" =>$this-> getDoctrine()->getRepository('BackDealBundle:Deal')->getdealrest() )), $entity, array(
                'action' => $this->generateUrl('compagne_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            ));

        }
        else
        {
            $em = $this->getDoctrine()->getManager();

            $region = $em->getRepository('BackPlanningBundle:Region')->find($idr);

            $form = $this->createForm(new CompagneType(array("em" =>$this-> getDoctrine()->getRepository('BackDealBundle:Deal')->listByRegion($region) )), $entity, array(
                'action' => $this->generateUrl('compagne_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            ));
        }

        $form->add('submit', 'submit', array('label' => 'Generer', 'attr' => array('class' => 'btn btn-success')));

        return $form;
    }

    private function createEditFinalForm(Compagne $entity)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new CompagneType(array("em" =>$this-> getDoctrine()->getRepository('BackDealBundle:Deal')->getdealrest() )), $entity, array(
            'action' => $this->generateUrl('compagne_updatef', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer', 'attr' => array('class' => 'btn btn-success span12')));

        return $form;
    }



    /**
     * Edits an existing Compagne entity.
     *
     */
    public function updateAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackDealBundle:Compagne')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Compagne entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditFinalForm($entity);
        $editForm->handleRequest($request);

        return $this->render('BackDealBundle:Compagne:editnew.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));

    }





    /**
     * Edits an existing Compagne entity.
     *
     */
    public function updateFinalAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackDealBundle:Compagne')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Compagne entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditFinalForm($entity);
        $editForm->handleRequest($request);




        if ($editForm->isValid()) {
            $user=$this->get('security.context')->getToken()->getUser();
            $entity->setUpdatedby($user->getName());

            $entity->setDateupdated(new \DateTime());
            $em->flush();


            return $this->redirect($this->generateUrl('dash_compagnes'));
        }

        return $this->redirect($this->generateUrl('dash_compagnes'));
    }










    /**
     * Deletes a Compagne entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BackDealBundle:Compagne')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Compagne entity.');
        }
        $em->remove($entity);
        $em->flush();




        return $this->redirect($this->generateUrl('dash_compagnes'));
    }

    /**
     * Creates a form to delete a Compagne entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('compagne_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer', 'attr' => array('class' => 'btn btn-danger')))
            ->getForm()
        ;
    }
}
