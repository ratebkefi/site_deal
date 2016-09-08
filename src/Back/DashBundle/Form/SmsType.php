<?php

namespace Back\DashBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SmsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array('label'=>"Libelle",'required'=>true))
            /*->add('operator', 'choice', array(
                'choices'   => array(
                    '60502' => 'Tunisie Télécome',
                    '60503' => 'Ooredoo',
                    '60501' => 'Tunisie Télécome'
                    ),
                'required'  => false,
            ))*/
            ->add('body', 'textarea', array('label'=>"Message",'required'=>true))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Back\DashBundle\Entity\Sms'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_dashbundle_sms';
    }
}
