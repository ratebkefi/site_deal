<?php

namespace Back\DashBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EntrepriseType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
        ->add('libelle', 'text', array('label'=>"Libelle",'required'=>true))
        ->add('adresse', 'text', array('label'=>"Adresse",'required'=>true))
        ->add('gerant', 'text', array('label'=>"Gérant",'required'=>true))
        ->add('tel', 'text', array('label'=>"Téléphone",'required'=>true))
        ->add('mf', 'text', array('label'=>"Matricule fiscal",'required'=>true))
        ->add('email', 'text', array('label'=>"Email",'required'=>true))

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Back\DashBundle\Entity\Entreprise'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'back_dashbundle_entreprise';
    }

}
