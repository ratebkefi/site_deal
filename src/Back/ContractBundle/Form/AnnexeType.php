<?php

namespace Back\ContractBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class AnnexeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('object',null,array('label'=>"Objet",'required'=>true))
            ->add('minCoupon',null,array('label'=>"Minimum de coupons pour valider le deal",'required'=>true))
            ->add('quota',null,array('label'=>"quota de règlement",'required'=>true))
            ->add('nbrGratuite',null,array('label'=>"Nombre de gratuité",'required'=>true))
            ->add('booking',null,array('label'=>"Réservation",'required'=>false))
            ->add('remark',null,array('label'=>"Remarques",'required'=>false))
            ->add('releaseDate','date', array('label'=>"Date de publication prévue",'required'=>false,
                'format' => 'dd/MM/yyyy',
                'input' => 'datetime',
                'widget' => 'single_text',
            ))

            ->add('fixedCommission',null,array('label'=>"Commission fixe (montant)",'required'=>false))
            ->add('variableCommission',null,array('label'=>"Commission variable (%)",'required'=>false))
            ->add('planning','entity',array( 'required' => false,'class' => 'BackPlanningBundle:Planning','label'=>"Planning",'empty_value' => "choisir planning",))

            ->add('protocol',null,array('label'=>"",'required'=>false))
            ->add('vedio',null,array('label'=>"Védio",))
            ->add('image',null,array('label'=>"Image",))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Back\ContractBundle\Entity\Annexe'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_contractbundle_annexe';
    }
}
