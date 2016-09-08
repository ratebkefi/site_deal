<?php
 
namespace Main\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConnexionType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder

        ->add('email', 'email', array('label'=>"E-Mail",'required'=>true))
        ->add('pwd', 'password', array('label'=>"Mot de Passe",'required'=>true))
        //->add('remeber', 'checkbox', array('label'=>"Se souvenir de moi",'required'=>false))

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'csrf_protection'   => true,
            'validation_groups' => array('filtering') // avoid NotBlank() constraint-related message
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'connexion_client';
    }

}
