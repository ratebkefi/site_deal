<?php

namespace Back\CommandeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use User\UserBundle\Entity\UserRepository;

class ticketFilterType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add ('status', 'choice', array('required'=>false,
                'label'=>'Etat',
                'choices'   => array(
                    '2'   => 'En cours',
                    '1' => 'Ouvert',
                    '3'   => 'Cloturé',
                ),
                'empty_value' => 'Choisissez l\'état',
                'multiple'  => false,
            ))
            ->add('commande', 'text', array('required'=>false,
                ))
            ->add('deal', 'entity', array('required'=>false,
                'empty_value' => 'Choisissez un deal',
                'class' => 'BackDealBundle:Deal',

            ))

            ->add('pnamec', 'text', array('label' => "Client",'required'=>false
            ))
            ->add('priorite' , 'choice', array(
                'choices'   => array(
                    '1'   => 'normal',
                    '2' => 'Urgent',
                    '3'   => 'Très urgent',
                ),
                'multiple'  => false,                'empty_value' => 'Choisissez un priorité',
            ))

            ->add('user', 'entity', array('required'=>false,'label' => "Partenaire",
                'multiple' => false,

                'empty_value' => 'Choisissez un agent',
                'class' => 'UserUserBundle:User',
                'query_builder'=> function(UserRepository $r) {
                    return  $r->createQueryBuilder("u")
                        ->where('u.roles LIKE :roles')

                        ->setParameter('roles', '%"SERVICECLIENT"%')
                        ->orWhere('u.roles LIKE :roles1')
                        ->setParameter('roles1', '%"FINANCIER"%')
                        ->orWhere('u.roles LIKE :roles2')
                        ->setParameter('roles2', '%"ROLE_SUPER_ADMIN"%')
                        ;
                },
            ))
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
        return 'back_commandebundle_ticketfilter';
    }
}
