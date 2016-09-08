<?php

namespace Main\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
        ->add('title','choice',array('required'=>true,
            'label'=>'Civilité',
            'choices'   => array(
                'M.'   => 'M.',
                'Mme' => 'Mme',
                'Mlle' => 'Mlle',
            ),'empty_value' => 'Civilité',))
        ->add('fname', 'text', array('label'=>"Prénom",'required'=>true))
        ->add('name', 'text', array('label'=>"Nom",'required'=>true))

        ->add('datebirth', null, array('widget' => 'single_text','label'=>"Date de naissance",'required'=>true, 'format' => 'dd/MM/yyyy'))
        ->add('cin', 'text', array('label'=>"CIN",'required'=>true))
        ->add('email', 'text', array('label'=>"E-Mail",'required'=>true))
        ->add('phone', 'text', array('label'=>"Téléphone",'required'=>true))
            ->add('password', 'repeated', array(

                'type' => 'password','required'=>false,
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'Mot de passe'
                ,
                    'attr' => array('class' => 'form-control')),

                'second_options' => array('label' => 'Confirmer le mot de passe',
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
        return 'commandebundle_client';
    }

}
