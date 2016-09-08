<?php

namespace Back\CommandeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use User\UserBundle\Entity\UserRepository;
use Back\CommandeBundle\Entity\OperationRepository;
class CommandFilterType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', null, array('required'=>false))

            ->add('etat','choice',array('required'=>false,
                'choices'   => array(
                    '0'   => 'En attente',
                    '1' => 'Payée',
                    '2' => 'En attente de confirmation',
                    '3' => 'Annulé',
                    '4' => 'Confirmé',
                ),'empty_value' => 'Choisissez l\'état',))
            ->add('deal', 'entity', array('required'=>false,
                'empty_value' => 'Choisissez un deal',
                'class' => 'BackDealBundle:Deal',

            ))
            ->add('numcoupon', null, array('required'=>false))

            ->add('paypar', 'entity', array('required'=>false,
                'empty_value' => 'Choisissez une caisse',
                'class' => 'BackCommandeBundle:Caisse',

            ))

            ->add('name', 'text', array('required'=>false))
            ->add('fname', 'text', array('required'=>false))

            ->add('telc', 'text', array('required'=>false))
            ->add('num_cheque',null,array('required'=>false,))
            /*->add('nom_porteur_cheque', 'entity', array('label' => "Nom porteur cheque", 'empty_value' => 'Choisissez Nom porteur cheque',
                'class' => 'BackCommandeBundle:Operation',
                'query_builder'=> function(OperationRepository $r) {
                    return  $r->createQueryBuilder("u")
                        ->where('u.titulaire IS NOT NULL');
                },'property' => 'titulaire',  'multiple' => false,'required' => false,))*/
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => false,
            'validation_groups' => array('filtering') // avoid NotBlank() constraint-related message
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_commandebundle_commandfilter';
    }
}
