<?php

namespace Back\DealBundle\Form;
use Back\DealBundle\Entity\DealRepository;
use Back\PlanningBundle\Entity\RegionRepository;
use Back\PlanningBundle\Entity\PlanningRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegionFilterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('region', 'entity', array(
                'label'=>'Region ',
                'multiple' => false,
                'attr'=>array('class'=>'span6', 'required'=>true),
                'class' => 'BackPlanningBundle:Region',
                'empty_value' => 'Toutes Les regions',
                'query_builder'=> function(RegionRepository $r) {
                    return  $r->createQueryBuilder("region");
                }
            ))

        ;




    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_dealbundle_region';
    }
}
