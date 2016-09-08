<?php
/**
 * Created by PhpStorm.
 * User: G50
 * Date: 04/03/2015
 * Time: 15:45
 */

namespace Back\CommandeBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ResponsableCaissieraddType extends AbstractType{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'Nom et Prénom','attr'=>array('class'=>'span10', 'required'=>true)))
            ->add('email', 'email', array('label' => 'Email', 'translation_domain' => 'FOSUserBundle','attr'=>array('class'=>'span10', 'required'=>true)))
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
            ->add('agency', 'text', array('label'=>'Agence','attr'=>array('class'=>'span10', 'required'=>true)))
            ->add('rib', 'text', array('label'=>'RIB','attr'=>array('class'=>'span10', 'required'=>true)))
            ->add('address', 'text', array('label'=>'Adresse','attr'=>array('class'=>'span10', 'required'=>false)))
            ->add('phone', 'text', array('label'=>'Téléphone','attr'=>array('class'=>'span10', 'required'=>false)))
            ->add('datenaisse', 'date', array('label'=>'Date de naissance','widget' => 'single_text','attr'   =>  array('class'   => 'datepicker'),'required'=>false, 'label' => 'Date de naissance', 'format' => 'dd/MM/yyyy'))
            ->add('cin', 'text', array('label'=>'C.I.N.','attr'=>array('class'=>'span10', 'required'=>false)))
            ->add('datecin','date', array('label'=>'Date de livraison C.I.N','widget' => 'single_text','attr'   =>  array('class'   => 'datepicker'),'required'=>false, 'format' => 'dd/MM/yyyy'))
            ->add('phoneurg', 'text', array('label'=>'Téléphone d\'urgence','attr'=>array('class'=>'span10', 'required'=>false)))
            ->add('adresseurg', 'text', array('label'=>'Adresse d\'urgence','attr'=>array('class'=>'span10', 'required'=>false)))

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
        return 'back_commandebundle_responsablecassier';
    }
}