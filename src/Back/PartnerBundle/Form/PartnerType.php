<?php
/**
 * Created by PhpStorm.
 * User: Prodexo
 * Date: 17/02/2015
 * Time: 11:54
 */

namespace Back\PartnerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PartnerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bank', null, array('attr' => array('class' => 'span10', 'required' => true)))
            ->add('agency', 'text', array('attr' => array('class' => 'span10', 'required' => true)))
            ->add('rib', 'text', array('attr' => array('class' => 'span10', 'required' => true)))
            ->add('address', 'text', array('attr' => array('class' => 'span10', 'required' => false)))
            ->add('phone', 'text', array('attr' => array('class' => 'span10', 'required' => false)))
            ->add('web_site', null, array('attr' => array('class' => 'span10', )))
            ->add('fbpage', 'text', array('attr' => array('class' => 'span10', 'required' => false)))
            ->add('region', 'entity', array('class' => 'BackPlanningBundle:Region', 'property' => 'name', 'multiple' => true,))
            ->add('category', 'entity', array(
                'label' => "Catégorie",
                'empty_value' => 'Choisissez une catégorie',
                'multiple' => false,
                'required' => true,
                'class' => 'BackPlanningBundle:Category'

            ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'User\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_partnerbundle_partner';
    }
}
