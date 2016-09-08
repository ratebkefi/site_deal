<?php

namespace Back\PlanningBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PlanningType extends AbstractType
{
    private $formOptions;

    public function __construct($options = array()){
        $this->formOptions = $options;
    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /*->add('state', 'choice', array('label'=>'Etat','required' => TRUE,
                'choices' => array(
                    '0' => 'Pré-Planifié',
                    '1' => 'Planifié',
                    '2'   => 'Rédigé',
                    '3' => 'Validé',
                    '4' => 'Annulé',
                    '5' => 'Rédaction refusée',

                ),
                'multiple' => FALSE,))*/
            ->add('object', "text", array('label'=>'Objet','required' => false))
            ->add('ca', "text", array('label'=>'Objectif Chiffre d\'affaire','required' => false))
            ->add('tariff', null, array(/*'currency' => "TND",*/ 'label'=>'Tarif',))
            ->add('description', null, array('label'=>'Description','required' => false))
            ->add('startDate', 'date', array('label'=>'Date de debut','required' => false,
                'format' => 'dd/MM/yyyy HH:mm',
                'input' => 'datetime',
                'widget' => 'single_text',
            ))
            ->add('endDate', 'date', array('label'=>'Date de fin','required' => false,
                'format' => 'dd/MM/yyyy HH:mm',
                'input' => 'datetime',
                'widget' => 'single_text',
            ))
            ->add('remarks', null, array('label'=>'Remarques','required' => false))
            ->add('categoryId', "entity", array(
                'label'=>'Catégorie',
                'required' => false,
                "empty_value" => "Choisir une catégorie...",
                "class" => 'BackPlanningBundle:Category',
                "choices" => $this->formOptions["em"]->getFormOption()))
            ->add('regionId', null, array('label'=>'Région','required' => false));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Back\PlanningBundle\Entity\Planning'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_planningbundle_planning';
    }
}
