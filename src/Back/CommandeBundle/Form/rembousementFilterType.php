<?php

namespace Back\CommandeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use User\UserBundle\Entity\UserRepository;

class rembousementFilterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('coupon')
            ->add('commande','text')
            ->add('pnamec', 'text', array('required'=>false,))
            ->add('remboursement' , 'choice', array(
                'choices'   => array(
                    '1'   => 'BigFid',
                    '2' => 'Virement',
                    '3'   => 'BigFid et Virement',
                ),
                'multiple'  => false,
                'empty_value' => 'Choisissez un mode de remboursement',
            ))
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
        return 'back_commandebundle_remboursementfilter';
    }
}
