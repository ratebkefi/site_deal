<?php

namespace Main\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InscriptionType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('title', 'choice', array('label'=>'Titre',
                'choices'   => array( 'M.'   => 'M.',
                    'Mme' => 'Mme',
                    'Mlle' => 'Mlle',),
                'required'  => false,
                'multiple'  => false,
                'empty_value' => 'Civilité',
            ))
        ->add('fname', 'text', array('label'=>"Prénom",'required'=>true))
        ->add('name', 'text', array('label'=>"Nom",'required'=>true))
        ->add('email', 'email', array('label'=>"E-Mail",'required'=>true))
        ->add('phone', 'text', array('label'=>"Téléphone",'required'=>true))
        ->add('password', 'repeated', array(

            'type' => 'password',
            'options' => array('translation_domain' => 'FOSUserBundle'),
            'first_options' => array('label' => "Mot de passe",
                'attr' => array('class' => 'form-control')),
            'second_options' => array('label' => 'Confirmer',
                'attr' => array('class' => 'form-control')),
            'invalid_message' => 'fos_user.password.mismatch',
        ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Back\CommandeBundle\Entity\Client'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'main_frontbundle_client';
    }

}
