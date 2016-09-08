<?php

namespace Back\PageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BannerType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label'=>"Libellé de la banière",'required'=>true))
            ->add('link', 'text', array('label'=>"Lien",'required'=>true))

            ->add('dated', 'date', array('widget' => 'single_text','label'=>"Date d'apparition",'required'=>true,'format' => 'dd/MM/yyyy'))
            ->add('datef', 'date', array('widget' => 'single_text','label'=>"Date d'éxpiration",'required'=>true,'format' => 'dd/MM/yyyy'))
            ->add('act', null, array('label'=>"Active",'required'=>false))
            //->add('media', 'text', array('label'=>"Fichier",'required'=>true))
            ->add('zone', 'choice', array('choices' => array('1' => 'Top', '2' => 'Bottom'),'empty_value' => 'Choisissez ','label'=>"Zone d'affichage",'required'=>true))
            ->add('target', 'choice', array('choices' => array('0' => 'dans la même fenêtre', '1' => 'dans une autre fenêtre'),'label'=>"Ouverture",'required'=>true,'empty_value' => 'Choisissez '))
            ->add('height', null, array('label'=>"Hauteur en px en cas de SWF",'required'=>true))
            ->add('width', null, array('label'=>"Largeur en px en cas de SWF",'required'=>true))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Back\PageBundle\Entity\Banner'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_pagebundle_banner';
    }
}
