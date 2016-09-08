<?php

namespace Back\DashBundle\Listener;
use Symfony\Component\HttpFoundation\Request;
use DoctrineORMEventLifecycleEventArgs;
use Back\PlanningBundle\Entity\Planning;
use SymfonyComponentDependencyInjectionContainer;
use DoctrineORMMapping as ORM;
class NotificationListener {
    protected $container;
    protected $doctrine;

    public function __construct(Container $container,$doctrine)
    {
        $this->container = $container;
		$this->doctrine = $doctrine;
		
    }

    /** @ORMPrePersist */
   public function onKernelRequest($container,$doctrine) {

       $request = $kernel->getRequest();
	   //var_dump($request); exit;
       $notification = $request->query->get('notif');
	   if($notification)
	   {
		echo $notification;
		//exit;
	   }
	   
    }

}