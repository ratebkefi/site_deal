<?php

namespace Back\PartnerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactPartnerType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname',null,array('required'=>true,'label'=>"Prénom du contact"))
            ->add('lastname',null,array('required'=>true,'label'=>"Nom du contact"))
            ->add('principale',null,array('required'=>false,'label'=>"Contact principale"))
            ->add('phone',null,array('required'=>false,'label'=>"Téléphone"))
            ->add('mail','email',array('required'=>false,'label'=>"E-mail"))
            ->add('job',null,array('required'=>true,'label'=>"Poste"))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Back\PartnerBundle\Entity\ContactPartner'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_partnerbundle_contactpartner';
    }
}
