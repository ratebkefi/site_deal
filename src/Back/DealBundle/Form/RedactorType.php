<?php
/**
 * Created by PhpStorm.
 * User: G50
 * Date: 04/03/2015
 * Time: 15:45
 */

namespace Back\DealBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RedactorType extends AbstractType{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => false,'attr'=>array('class'=>'span10', 'required'=>true)))
            ->add('email', 'email', array('label' => false, 'translation_domain' => 'FOSUserBundle','attr'=>array('class'=>'span10', 'required'=>true)))
            ->add('bank', 'entity', array(
                'label'=>'Banque ',
                'attr'=>array('class'=>'span10', 'required'=>true),
                'class' => 'BackCommandeBundle:Bank',
                'empty_value' => 'Choisissez une banque',
                'query_builder'=> function(\Back\CommandeBundle\Entity\BankRepository $r) {
                    return  $r->createQueryBuilder("d")->where('d.act=1');
                }
            ))
            ->add('profilePictureFile', 'file', array('label' => "Photo", 'required' => false,'data_class' => null))
            ->add('agency', 'text', array('attr'=>array('class'=>'span10', 'required'=>true)))
            ->add('rib', 'text', array('attr'=>array('class'=>'span10', 'required'=>true)))
            ->add('address', 'text', array('attr'=>array('class'=>'span10', 'required'=>false)))
            ->add('phone', 'text', array('attr'=>array('class'=>'span10', 'required'=>false)))
            ->add('datenaisse', 'date', array('widget' => 'single_text','attr'   =>  array('class'   => 'datepicker'),'required'=>false, 'label' => false, 'format' => 'dd/MM/yyyy'))
            ->add('cin', 'text', array('attr'=>array('class'=>'span10', 'required'=>false)))
            ->add('datecin','date', array('widget' => 'single_text','attr'   =>  array('class'   => 'datepicker'),'required'=>false, 'label' => false, 'format' => 'dd/MM/yyyy'))
            ->add('phoneurg', 'text', array('attr'=>array('class'=>'span10', 'required'=>false)))
            ->add('adresseurg', 'text', array('attr'=>array('class'=>'span10', 'required'=>false)))

        ;
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
        return 'back_dealbundle_redactor';
    }
}