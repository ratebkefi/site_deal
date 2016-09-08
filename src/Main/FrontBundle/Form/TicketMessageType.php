<?php

namespace Main\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class TicketMessageType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder

        //->add('message', 'text', array('label'=>"Message",'required'=>true))
        //->add('path', null, array('label' => "text",'required'=>false))
        //->add('file', null, array('label' => "Fichier",'required'=>false))
        ->add('file', 'file', array( 'required' => false,'error_bubbling' => true));



        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Back\CommandeBundle\Entity\TicketMessage',
        ));
    }
    /**
     * @return string
     */
    public function getName() {

        return 'commandebundle_ticketmessage';
    }

}
