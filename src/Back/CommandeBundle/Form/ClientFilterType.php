<?php

namespace Back\CommandeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientFilterType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array('label' => "Client",'required'=>false
                ))
            ->add('prenom', 'text', array('label' => "Client",'required'=>false
            ))
          //  ->add('noprenom', 'entity', array('label' => "Bom & prénom",'class' => 'BackCommandeBundle:Client', 'property' => 'namefname', 'multiple' => false,'empty_value' => 'Choisissez un client',))

            //->add('name',null,array('required'=>false))
            //->add('fname',null,array('required'=>false))
            ->add('phone', 'text', array('label' => "Client",'required'=>false
          ))
            ->add('email', 'text', array('label' => "Client",'required'=>false
            ))
            //->add('cin',null,array('required'=>false))
            ->add('stat','choice',array('required'=>false,
                'choices'   => array(
                '1'   => 'Autorisé',
                '0' => 'Bannée',
            ),'empty_value' => 'Choisissez l\'etat',))
            //->add('localite')
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
        return 'back_commandebundle_clientfilter';
    }
}
