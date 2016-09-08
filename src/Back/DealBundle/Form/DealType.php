<?php

namespace Back\DealBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DealType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
        $builder
            ->add('title',null,array('label'=>'Titre'))
            ->add('seoTitle',null,array('label'=>'Titre du page'))
            ->add('seoDescription',null,array('label'=>'Description du page'))
            ->add('seoLink',null,array('label'=>'Permalien'))
            ->add('description',null,array('label'=>'Description'))
            ->add('deal',null,array('label'=>'Le Deal'))
            ->add('youLike',null,array('label'=>'Vous allez adorer'))
            ->add('strongpoint',null,array('label'=>'Les points fort'))
            ->add('bigdeallike',null,array('label'=>'BigDeal.tn aime'))
            ->add('toBeClear',null,array('label'=>'Soyons clairs'))
            ->add('slider',null,array('label'=>'Afficher dans le slider', 'required'=>false))

            ->add('startDateValidtyCoupon', 'date', array('widget' => 'single_text','attr'   =>  array('class'   => 'datepickerField'),'required'=>false, 'label' => "Date de début de validité de coupon", 'format' => 'dd/MM/yyyy'))
            ->add('endDateValidtyCoupon', 'date', array('widget' => 'single_text','attr'   =>  array('class'   => 'datepickerField'),'required'=>false, 'label' => "Date de fin de validité de coupon", 'format' => 'dd/MM/yyyy'))
            ->add('image1')
            ->add('image2')
            ->add('image3')
            ->add('image4')
            ->add('cashPayment',null,array('label'=>'Accepter payment espéce'))
            ->add('maxCouponUser',null,array('label'=>'Max coupon par client'))


                ;
                
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Back\DealBundle\Entity\Deal'
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
