<?php

namespace Back\CommandeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RetraitType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('search', 'submit')

            //->add('client')
        ;
    }
    


    /**
     * @return string
     */
    public function getName()
    {
        return 'back_commandebundle_responsablecaissier';
    }
}
