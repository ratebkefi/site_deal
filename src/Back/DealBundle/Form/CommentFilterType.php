<?php

namespace Back\DealBundle\Form;

use Back\CommandeBundle\Entity\ClientRepository;
use Back\DealBundle\Entity\DealRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use User\UserBundle\Entity\UserRepository;

class CommentFilterType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('partenar', 'entity', array('label' => "Partenaire",
                'multiple' => false,
                'required' => false,
                'empty_value' => 'Choisissez le partenaire',
                'class' => 'UserUserBundle:User',
                'query_builder'=> function(UserRepository $r) {
                    return  $r->createQueryBuilder("u")
                        ->where('u.roles LIKE :roles')
                        ->setParameter('roles', '%"PARTENAIRE"%');
                },
            ))
            ->add('deal', 'entity', array('required'=>false,
                'empty_value' => 'Choisissez un deal',
                'class' => 'BackDealBundle:Deal',

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
        return 'back_dealbundle_filter_comment';
    }
}
