<?php

namespace Back\DealBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use User\UserBundle\Entity\UserRepository;
class DealChangeType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('redacteur', 'entity', array('label' => "Réassigner à",
                'multiple' => false,
                'required' => true,
                'empty_value' => 'Choisissez un rédactuer',
                'class' => 'UserUserBundle:User',
                'query_builder'=> function(UserRepository $r) {
                    return  $r->createQueryBuilder("u")
                        ->where('u.roles LIKE :roles')
                        ->setParameter('roles', '%"REDACTEUR"%');
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
            'data_class' => 'Back\DealBundle\Entity\Deal'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_dealbundle_deal';
    }
}
