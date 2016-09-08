<?php

namespace Back\CommandeBundle\Form;

use Guzzle\Http\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class CommandType extends AbstractType
{
    public function __construct(  $clientId ) {
        $this->client_id = $clientId;

    }
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $clientId = $this->client_id;

        $builder
            ->add('qte', 'choice', array(
                'choices'   => array(""=>""),
                'required'  => true,
            ))
            ->add('deal', 'entity', array(
                'multiple' => false,
                'required' => true,
                'empty_value' => 'Choisissez le deal',
                'class' => 'BackDealBundle:Deal',
                'query_builder'=> function(\Back\DealBundle\Entity\DealRepository $r) {
                    $dt = new \DateTime();
                    return  $r
                        ->createQueryBuilder('v')
                        //->select('v.deal')
                        ->join('BackPlanningBundle:Planning', 'plan')
                        ->where('v.planning = plan.id')
                        ->andWhere('plan.state= 3')
                        ->andWhere("plan.startDate <=  '" . $dt->format('Y-m-d H:i:s') . "'")
                        ->andWhere("plan.endDate >=  '" . $dt->format('Y-m-d H:i:s') . "'")


                        ; }
            ))
            ->add('reference', 'entity', array(
                'multiple' => false,
                'required' => true,
                'empty_value' => 'Choisissez une réfrence',
                'class' => 'BackContractBundle:Reference',
                'query_builder'=> function(\Back\ContractBundle\Entity\ReferenceRepository $r) {
                    return $r->findBy(array('id',0));
                }
            ))
            ->add('reference')

                ->add('adresse', 'entity', array(
                'multiple' => false,
                'required' => true,
                'empty_value' => 'Choisissez une adresse',
                'class' => 'BackCommandeBundle:Adress',
                    'query_builder' => function(\Back\CommandeBundle\Entity\AdressRepository $er) use ($clientId) {
                        return $er->createQueryBuilder('s')
                           ->where('s.client = :lvl')
                            ->setParameter('lvl' , $clientId);
                    },
                ))

            //->add('adresse')
            //->add('client')
        ;
        //echo $this->client_id; exit;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Back\CommandeBundle\Entity\Command'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_commandebundle_command';
    }
}
