<?php
/**
 * Created by PhpStorm.
 * User: big-deal
 * Date: 27/03/2015
 * Time: 23:45
 */


namespace Back\PartnerBundle\Twig\Extension;


class ContactExtension extends \Twig_Extension
{
    protected $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function getFunctions()
    {
        return array(
            'getContactPrincipale' => new \Twig_Function_Method($this, 'getContactPrincipale'),
            'getPosteContactPrincipale' => new \Twig_Function_Method($this, 'getPosteContactPrincipale'),
            'getListeQuestion' => new \Twig_Function_Method($this, 'getListeQuestion'),
            'getListeReponse' => new \Twig_Function_Method($this, 'getListeReponse'),

        );
    }

    /**
     * @param string $string
     * @return int
     */
    public function getListeReponse($question,$annexe)
    {
        $reponse = $this->em->getRepository('BackPlanningBundle:ResponseRequiredInfo')->findBy(array("requiredInfoId"=>$question,"annexe"=>$annexe));

        foreach($reponse as $values)
        {
            return $values->getResponse();

        }
    }
    public function getListeQuestion($category)
    {
        $question = $this->em->getRepository('BackPlanningBundle:requiredInfo')->findBy(array("categoryId"=>$category));
        return $question;

    }
    public function getPosteContactPrincipale($protocole)
    {
        $contact = $this->em->getRepository('BackPartnerBundle:ContactPartner')->findBy(array("user"=>$protocole,"principale"=>1));
        foreach($contact as $values)
        {
            return $values->getJob();

        }

    }
    public function getContactPrincipale($protocole)
    {
        $contact = $this->em->getRepository('BackPartnerBundle:ContactPartner')->findBy(array("user"=>$protocole,"principale"=>1));
        foreach($contact as $values)
        {
            return $values->getFirstname()." ". $values->getLastname();

        }

    }




    public function getName()
    {
        return 'contact_extension';
    }
}
