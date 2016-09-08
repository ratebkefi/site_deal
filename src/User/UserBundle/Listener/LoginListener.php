<?php
namespace User\UserBundle\Listener;

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine; // for Symfony 2.1.0+
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Hpar\PrestashopBridge\PrestashopBridge;
/**
 * Custom login listener.
 */
 
class LoginListener
{
    /** @var \Symfony\Component\Security\Core\SecurityContext */
    private $securityContext;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    /**
     * Constructor
     *
     * @param SecurityContext $securityContext
     * @param Doctrine        $doctrine
     */
    public function __construct(SecurityContext $securityContext, Doctrine $doctrine)
    {
        $this->securityContext = $securityContext;
        $this->em              = $doctrine->getEntityManager();
    }

    /**
     * Do the magic.
     *
     * @param InteractiveLoginEvent $event
     */
    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        if ($this->securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
            // user has just logged in
        }

        if ($this->securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            // user has logged in using remember_me cookie
        }


        /*$prestaBridge = new PrestashopBridge('/home/bigdeal/shop_public_html', 1);
        $user = $this->securityContext->getToken()->getUser();
		$role = $this->securityContext->getToken()->getRoles()[0]->getRole();

        if($role=="ROLE_CLIENT")
        {
            
        
        if (!$prestaBridge->userExist($user->getEmail())) //if user exist in prestahop database
            $prestaBridge->createUser(
                $user->getEmail(),
                $user->getName(),
                $user->getFname(),
				$user->getPassword()

            );

        $prestaBridge->login($user->getEmail());
		*/



        }




        // ...

}