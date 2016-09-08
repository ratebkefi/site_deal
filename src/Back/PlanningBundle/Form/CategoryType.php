<?php

namespace Back\PlanningBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoryType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('attr'=>array('class'=>'span10')))
            ->add('color', 'text', array('attr'=>array('class' => 'pick-a-color form-control span10')))
            ->add('national', 'choice', array(
                'choices' => array('1' => 'Oui', '0' => 'Non'),
                'empty_value'=>false,
                'required' => false,
                'label'=>'Région Nationale'
            ))

             ->add('parent')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Back\PlanningBundle\Entity\Category'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_planningbundle_category';
    }
}
