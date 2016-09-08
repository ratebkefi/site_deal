<?php

namespace Back\DealBundle\Form;
use Back\DealBundle\Entity\DealRepository;
use Back\PlanningBundle\Entity\RegionRepository;
use Back\PlanningBundle\Entity\PlanningRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CompagneType extends AbstractType
{
    public function __construct($options = array()){
        $this->formOptions = $options;
    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('namecompagne', 'text', array('label' => 'Nom de la Compagne'))
            ->add('dealcompagne', 'entity', array(
                'label'=>'Deal Featured',
                'multiple' => false,
                'attr'=>array('class'=>'span12', 'required'=>true),
                'class' => 'BackDealBundle:Deal',
                'empty_value' => 'Deal',
                "choices" => $this->formOptions["em"]
            ))
            ->add('dealfeatued', 'entity', array(
                'label'=>'Autres Deal ',
                'multiple' => true,
                'expanded' => true,
                'attr'=>array('required'=>true),
                'class' => 'BackDealBundle:Deal',
                'empty_value' => 'Deal',
                "choices" => $this->formOptions["em"]
            ))

        ;




    }


    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Back\DealBundle\Entity\Compagne'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_dealbundle_compagne';
    }
}
