<?php
/**
 * Created by PhpStorm.
 * User: Prodexo
 * Date: 17/02/2015
 * Time: 11:54
 */

namespace Back\PartnerBundle\Form;
use Doctrine\ORM\EntityManager;
use User\UserBundle\Entity\UserRepository;
use Back\DealBundle\Entity\DealRepository;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InvoiceFilterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('user', 'entity', array('label' => "Partenaire",
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
            ->add('etat', 'choice', array(
                'choices'   => array('1' => 'En attente', '2' => 'Payée'),
                'required'  => false,
            ))
            ->add('deal', 'entity', array(
                'empty_value' => 'Choisissez un deal',
                'class' => 'BackDealBundle:Deal',
                'required'=>false,

            ));
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
        return 'back_partnerbundle_invoicefilter';
    }
}
