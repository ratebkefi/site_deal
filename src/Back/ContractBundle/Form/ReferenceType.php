<?php

namespace Back\ContractBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReferenceType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('shopPrice', 'text', array(
                'required'=>true,'label'=>'Prix de la boutique'
            ))
            ->add('bigdealPrice', 'text', array('required'=>true,'label'=>'Prix de BigDeal'

            ))
            ->add('maxCoupon','integer',array('required'=>true,'label'=>'Stock'))
            //->add('returnedGoods')
            ->add('shipping',null,array('required'=>false,'label'=>'Livraison'))
            ->add('price', null, array('required'=>false,'label'=>'Prix de la livraison (TND)',
                //'currency' => 'TND',
            ))
            ->add('description',null,array('required'=>false,'label'=>'Détail de l\'offre'))
            ->add('weight',null,array('required'=>false,'label'=>'Poids (Kg)'))
            ->add('length',null,array('required'=>false,'label'=>'Longueur (Cm)'))
            ->add('width',null,array('required'=>false,'label'=>'Largeur (Cm)'))
            ->add('height',null,array('required'=>false,'label'=>'Hauteur (Cm)'))
            //->add('annexe',null,array('required'=>false,'label'=>'Prix de la boutique'))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Back\ContractBundle\Entity\Reference'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_contractbundle_reference';
    }
}
