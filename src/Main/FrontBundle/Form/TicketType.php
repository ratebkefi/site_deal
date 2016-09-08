<?php

namespace Main\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Back\CommandeBundle\Entity\CommandRepository;
use Main\FrontBundle\Form\TicketMessageType;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Validator\Constraints\Collection;

class TicketType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder

        ->add('object', 'text', array('label'=>"Objet",'required'=>true))
            ->add('commande', 'entity', array('label' => "Commande",
                'multiple' => false,
                'required' => true
            ,'property'=>'macommande',
                'class' => 'BackCommandeBundle:Command',
                'query_builder'=> function(CommandRepository $r) use($options){
				 return  $r
                        ->createQueryBuilder('u')
                        ->join('BackCommandeBundle:Coupon', 'coup')
                        ->where('u.id = coup.command')
                        ->andWhere('coup.vendu in(3,2) ')
                        ->andWhere('u.client= '.$options['id'])
                        ;
                    
                },
            ))
        ->add('message', 'collection', array(
            'type' => new TicketMessageType(),
            'allow_add' => true, 
    'allow_delete' => true, 
    'by_reference' => true,
        ) );
           // ->add('images', 'file')
            //->add('profilePictureFile', 'file', array('label' => "Fichier", 'required' => false,'data_class' => 'Back\CommandeBundle\Entity\TicketMessage','property'=>'profilePictureFile'))


        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {

        $resolver->setDefaults(array(
            'data_class' => 'Back\CommandeBundle\Entity\Ticket'
            ,'id' => null
        ));
    }

    /**
     * @return string
     */
    public function getName() {

        return 'commandebundle_ticket';
    }

}
