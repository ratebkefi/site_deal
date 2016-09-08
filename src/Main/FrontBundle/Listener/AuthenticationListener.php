<?php
// AuthenticationListener.php

namespace Main\FrontBundle\Listener;

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Doctrine\ORM\EntityManager;
use Back\CommandeBundle\Entity\Client;
class AuthenticationListener
{

    protected $em;
    protected $securityContext;
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
		//$this->securityContext = $securityContext;
    }
    /**
     * onAuthenticationSuccess
     *
     * @author 	Ali Belhaj <ali.belhadjj@gmail.com>
     * @param 	InteractiveLoginEvent $event
     */
    public function onAuthenticationSuccess( InteractiveLoginEvent $event )
    {
    //    var_dump($event);
        $user = $event->getAuthenticationToken()->getUser();
        $role = $event->getAuthenticationToken()->getRoles();
		//var_dump($role); exit;
		//echo $role[0]; exit;
		//if ($this->securityContext->isGranted(array('ROLE_CLIENT'))) 
        if($event->getAuthenticationToken()->getRoles()[0]->getRole()=="ROLE_CLIENT")
        { 
            $client = $this->em->getRepository("BackCommandeBundle:Client")->find($user->getId());
            $client->setLastLogin(new \DateTime());
            $this->em->persist($client);
            $this->em->flush();
        }

    }
}