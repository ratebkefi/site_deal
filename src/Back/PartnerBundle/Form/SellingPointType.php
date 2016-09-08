<?php

namespace Back\PartnerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SellingPointType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',null,array('label'=>"Point de vente",'required'=>true))
            ->add('adress',null,array('label'=>"Adresse",'required'=>true))
            ->add('latitude',null,array('label'=>"Latitude ",'required'=>true))
            ->add('longitude',null,array('label'=>"Longitude ",'required'=>true))
            ->add('phone',null,array('label'=>"Téléphone ",'required'=>true))
            ->add('visible',null,array('label'=>"Masquer l'adresse réelle ",'required'=>false))
            ->add('visibleAdress',null,array('label'=>"Adresse Visible",'required'=>false))
            ->add('latVisibleAdress',null,array('label'=>"Latitude Adresse Visible",'required'=>false))
            ->add('lonVisibleAdress',null,array('label'=>"Longitude Adresse Visible",'required'=>false))
            ->add('nbrEmployee',null,array('label'=>"Nombre d'employés",'required'=>false))
            ->add('capacityPerHour',null,array('label'=>"Capacité par heure",'required'=>false))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Back\PartnerBundle\Entity\SellingPoint'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_partnerbundle_sellingpoint';
    }
}
