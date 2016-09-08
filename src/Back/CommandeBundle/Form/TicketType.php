<?php

namespace Back\CommandeBundle\Form;

use User\UserBundle\Entity\UserRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Main\FrontBundle\Form\TicketMessageType;

class TicketType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('commande', 'entity', array(
                'multiple' => false,
                'required' => true,
                'empty_value' => 'Choisissez une commande',
                'class' => 'BackCommandeBundle:Command',
                'query_builder'=> function(\Back\CommandeBundle\Entity\CommandRepository $r) {
                    return $r->findBy(array('id',0));
                }
            ))
            ->add('message', 'collection', array(
                'type' => new TicketMessageType(),
                'allow_add'    => true,
                'allow_delete' => true,
            ) )
            ->add('commande')

            ->add('object' ,null, array('required' => true))
            /*->add('status' , 'choice', array(
                'choices'   => array(
                    '1'   => 'Ouvert',
                    '2' => 'En cours',

                ),
                'multiple'  => false,))*/
            ->add('priorite' , 'choice', array(
                'choices'   => array(
                    '1'   => 'normal',
                    '2' => 'Urgent',
                    '3'   => 'Très urgent',
                ),
                'multiple'  => false,))

        ->add('user', 'entity', array('label' => "Partenaire",
        'multiple' => false,
        'required' => true,
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
    ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Back\CommandeBundle\Entity\Ticket'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_commandebundle_ticket';
    }
}
