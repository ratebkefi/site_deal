<?php

namespace Back\DashBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegleType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
        ->add('libelle', 'text', array('label'=>"Libelle",'required'=>true))
            ->add('starDate', 'date', array('widget' => 'single_text', 'label' => "Date de début",'required'=>true, 'format' => 'dd/MM/yyyy'))
            ->add('endDate', 'date', array('widget' => 'single_text', 'label' => "Date de fin",'required'=>true, 'format' => 'dd/MM/yyyy'))
        ->add('act', null, array('label'=>"Activé?",'required'=>false))

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Back\DashBundle\Entity\Regle'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'back_dashbundle_regle';
    }

}
