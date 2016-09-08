<?php
/**
 * Created by PhpStorm.
 * User: Prodexo
 * Date: 17/02/2015
 * Time: 11:54
 */

namespace Back\PartnerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PartneraddType extends AbstractType
{
    private $formOptions;

    public function __construct($options = array()){
        $this->formOptions = $options;
    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => "Nom du partenaire", 'attr' => array('class' => 'span10', 'required' => true)))
            ->add('email', 'email', array('label' => "E-mail", 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'span10', 'required' => true)))
            ->add('bank', 'entity', array(
                'label'=>'Banque ',
                'attr'=>array('class'=>'span10', 'required'=>true),
                'class' => 'BackCommandeBundle:Bank',
                'empty_value' => 'Choisissez une banque',
                'query_builder'=> function(\Back\CommandeBundle\Entity\BankRepository $r) {
                    return  $r->createQueryBuilder("d")->where('d.act=1');
                }
            ))
            ->add('agency', 'text', array('label' => "Agence", 'attr' => array('class' => 'span10', 'required' => true)))
            ->add('rib', 'text', array('label' => "RIB", 'attr' => array('class' => 'span10', 'required' => true,"maxlength" =>20)))
            ->add('tva', 'text', array('label' => "Code TVA", 'attr' => array('class' => 'span10', 'required' => true)))
            ->add('address',null, array('label' => "Adresse", 'attr' => array('class' => 'span10', )))
            ->add('phone', null, array('label' => "Téléphone", 'attr' => array('class' => 'span10', )))
            ->add('web_site', null, array('label' => "Site web", 'attr' => array('class' => 'span10')))
            ->add('fbpage', null, array('label' => "Page facebook", 'attr' => array('class' => 'span10',)))
            ->add('region', 'entity', array('label' => "Région", 'class' => 'BackPlanningBundle:Region', 'property' => 'name', 'multiple' => true,))
            ->add('profilePictureFile', 'file', array('label' => "Logo", 'required' => false,'data_class' => null))
            ->add('category', "entity", array(
                'label'=>'Catégorie',
                'required' => true,
                "empty_value" => "Choisir une catégorie...",
                "class" => 'BackPlanningBundle:Category',
                "choices" => $this->formOptions["em"]->getFormOption()))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'User\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_partnerbundle_partner';
    }
}
