<?php

namespace Back\CommandeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use User\UserBundle\Entity\UserRepository;
class CaisseFilterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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

            ->add('deal', 'entity', array('required'=>false,
                'empty_value' => 'Choisissez un deal',
                'class' => 'BackDealBundle:Deal',

            ))

            ->add('paypar', 'entity', array('required'=>false,
                'empty_value' => 'Choisissez une caisse',
                'class' => 'BackCommandeBundle:Caisse',

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
        return 'back_commandebundle_caissefilter';
    }
}
