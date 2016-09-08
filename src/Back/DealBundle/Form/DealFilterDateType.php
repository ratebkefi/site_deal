<?php

namespace Back\DealBundle\Form;
use User\UserBundle\Entity\UserRepository;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DealFilterDateType extends AbstractType
{
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
            ->add('id', null, array('required'=>false))
            ->add('category', "entity", array(
                'label'=>'Catégorie',
                'required' => false,
                "empty_value" => "Choisir une catégorie...",
                "class" => 'BackPlanningBundle:Category',
                "choices" => $this->formOptions["em"]->getFormOption()))
            ->add('dpafp', 'date', array('label'=>'Date de début','required' => false,
                'format' => 'dd/MM/yyyy',
                'input' => 'datetime',
                'widget' => 'single_text',
            ))
            ->add('dpatp', 'date', array('label'=>'Date de début','required' => false,
                'format' => 'dd/MM/yyyy',
                'input' => 'datetime',
                'widget' => 'single_text',
            ))
            ->add('region', 'entity', array('required'=>false,
                'empty_value' => 'Choisissez une région',
                'class' => 'BackPlanningBundle:Region',
            ))
            ->add('partenar', 'entity', array('label' => "Partenaire",
                'multiple' => false,
                'required' => false,
                'empty_value' => 'Choisissez le partenaire',
                'class' => 'UserUserBundle:User',
                'query_builder'=> function(UserRepository $r) {
                    return  $r->createQueryBuilder("u")
                        ->where('u.roles LIKE :roles')
                        ->setParameter('roles', '%"PARTENAIRE"%');
                },
            ))


            ->add('title',  'text', array('required'=>false,))
            ->add('en_cours',  'checkbox', array('required'=>false,'label' => "Deal en cours",))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => false,
            'validation_groups' => array('filtering') // avoid NotBlank() constraint-related message
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_dealbundle_filterdeal';
    }
}
