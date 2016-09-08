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

class InvoiceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           ->add('numfacture','text', array('label' => "N° de facture"))
            ->add('user', 'entity', array('label' => "Partenaire",
                'multiple' => false,
                'required' => true,
                'empty_value' => 'Choisissez le partenaire',
                'class' => 'UserUserBundle:User',
                'query_builder'=> function(UserRepository $r) {
                    return  $r->createQueryBuilder("u")
                        ->where('u.roles LIKE :roles')
                        ->setParameter('roles', '%"PARTENAIRE"%');
                },
            ))
            ->add('etat', 'choice', array('label'=>"Etat de paiement",
                'choices'   => array('1' => 'En attente', '2' => 'Payée'),
                'required'  => false,
            ))
            ->add('deal', 'entity', array(
                'empty_value' => 'Choisissez un deal',
                'class' => 'BackDealBundle:Deal',
                'required'=>true,
                'attr'=>array('readonly'=>"readonly")
            ))
            ->add('payement', 'choice', array('label'=>"Type de paiement",
                'choices'   => array('1' => 'Espèce', '2' => 'Virement'),
                'required'  => false,
            ))
            ->add('file',null,array('label'=>"Ordre de virement"))
            ->add('dvir', 'date', array('widget' => 'single_text', 'label' => "Date de paiement",'required'=>true, 'format' => 'dd/MM/yyyy'))

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {

        $resolver->setDefaults(array(
            'data_class' => 'Back\PartnerBundle\Entity\Invoice',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_partnerbundle_invoice';
    }
}
