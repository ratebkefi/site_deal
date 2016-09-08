<?php

namespace Back\CommandeBundle\Form;

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

            ->add('message', 'textarea', array('label'=>"Message",'required'=>true))
            ->add('file','file', array('required' => false))
        ;
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

        return 'ticketbundle_ticketmessage';
    }

}
