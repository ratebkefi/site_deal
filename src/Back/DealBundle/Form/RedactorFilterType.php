<?php

namespace Back\DealBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use User\UserBundle\Entity\UserRepository;
class RedactorFilterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            $builder
                ->add('name', 'entity', array('label' => "Nom", 'empty_value' => 'Choisissez un Rédacteur',
                    'class' => 'UserUserBundle:User',
                    'query_builder'=> function(UserRepository $r) {
                        return  $r->createQueryBuilder("u")
                            ->where('u.roles LIKE :roles')
                            ->setParameter('roles', '%"REDACTEUR"%');
                    },'property' => 'name',  'multiple' => false,'required' => false,))
                ->add('email', 'entity', array('label' => "E-mail", 'empty_value' => 'Choisissez email Rédacteur',
                    'class' => 'UserUserBundle:User',
                    'query_builder'=> function(UserRepository $r) {
                        return  $r->createQueryBuilder("u")
                            ->where('u.roles LIKE :roles')
                            ->setParameter('roles', '%"REDACTEUR"%');
                    },'property' => 'email',  'multiple' => false,'required' => false,));




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
        return 'back_commandebundle_redactorfilter';
    }
}
