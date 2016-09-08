<?php

namespace Back\ContractBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContractType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type',null,array('label'=>'Titre'))
            ->add('salaire1',null,array('label'=>'Salaire 1'))
            ->add('salaire2',null,array('label'=>'Salaire 2'))
            ->add('startdate',null,array('label'=>'Date de début'))
            ->add('enddate',null,array('label'=>'Date de fin'))
            ->add('status',null,array('label'=>'Etat'))
                ;
                
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'USER\UserBundle\Entity\Contract'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_dealbundle_deal';
    }
}
