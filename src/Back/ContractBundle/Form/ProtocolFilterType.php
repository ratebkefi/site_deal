<?php

namespace Back\ContractBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\False;
use User\UserBundle\Entity\UserRepository;
class ProtocolFilterType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datepd','date', array('label'=>false,'required' => false,
                'format' => 'dd/MM/yyyy',
                'input' => 'datetime',
                'widget' => 'single_text',
            ))->add('datepf','date', array('label'=>false,'required' => false,
                'format' => 'dd/MM/yyyy',
                'input' => 'datetime',
                'widget' => 'single_text',
            ))
            ->add('status','choice',array('required'=>false,
                'choices'   => array(
                    '0'   => 'Non Activé',
                    '1' => 'Acivé',
                ),'empty_value' => 'Choisissez l\'etat',))
            ->add('user', 'entity', array('label' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => 'Choisissez un partenaire',
                'class' => 'UserUserBundle:User',
                'query_builder'=> function(UserRepository $r) {
                    return  $r->createQueryBuilder("u")
                        ->where('u.roles LIKE :roles')
                        ->setParameter('roles', '%"PARTENAIRE"%');
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
        return 'back_contractbundle_filterprotocol';
    }
}
