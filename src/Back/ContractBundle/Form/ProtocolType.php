<?php

namespace Back\ContractBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use User\UserBundle\Entity\UserRepository;
class ProtocolType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('datep', 'date', array('widget' => 'single_text', 'label' => "Date de début",'required'=>true, 'format' => 'dd/MM/yyyy'))
                ->add('status',null,array('label' => "Actif?",'required'=>false))
                ->add('entreprise',null,array('label' => "Entreprise",'required'=>false))
                /*->add('user', 'entity', array('label' => "Partenaire",
                    'multiple' => false,
                    'required' => true,
                    'empty_value' => 'Choisissez le partenaire',
                    'class' => 'UserUserBundle:User',
                     'query_builder'=> function(UserRepository $r) {
                    return  $r->createQueryBuilder("u")
                            ->where('u.roles LIKE :roles')
            ->setParameter('roles', '%"PARTENAIRE"%');
                },
                ))*/
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Back\ContractBundle\Entity\Protocol'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'back_contractbundle_protocol';
    }

}
