<?php

namespace Back\CommandeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VirementType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('montant')
            ->add('rib')
            ->add('remarque')
            ->add('file')
            ->add('dcr', 'date', array('widget' => 'single_text', 'label' => "Date rembourcemment",'required'=>true, 'format' => 'dd/MM/yyyy'))
            ->add('etat', 'choice', array(
                'choices' => array(
                    '1'   => 'Accepter',
                    '0' => 'Réfuser',
                )
                )
                )
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Back\CommandeBundle\Entity\Virement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_commandebundle_virement';
    }
}
