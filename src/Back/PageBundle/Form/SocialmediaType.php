<?php

namespace Back\PageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SocialmediaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('icon', 'choice', array('label'=>"Icon",'required'=>true,'choices'   => array(
                'fa fa-youtube'   => 'youtube',
                'fa fa-instagram' => 'instagram',
                'fa fa-twitter'   => 'twitter',
                'fa fa-facebook'   => 'facebook',
                'fa fa-google-plus'   => 'google-plus',
            ),
                'empty_value' => 'Choisissez',
                'multiple'  => false,))
            ->add('lien', 'text', array('label'=>"Lien",'required'=>true))
            ->add('ord', null, array('label'=>"Ordre d'affichage",'required'=>true))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Back\PageBundle\Entity\Socialmedia'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'back_pagebundle_socialmedia';
    }
}
