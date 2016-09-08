<?php

namespace Back\CommandeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use User\UserBundle\Entity\UserRepository;
class SuiviCommandFilterType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('etat','choice',array('required'=>false,
                'choices'   => array(
                    '0'   => 'En attente',
                    '1' => 'Payé',
                ),'empty_value' => 'Choisissez l\'etat',))
            ->add('deal', 'entity', array('required'=>false,
                'empty_value' => 'Choisissez un deal',
                'class' => 'BackDealBundle:Deal',

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
        return 'back_commandebundle_commandfilter';
    }
}
