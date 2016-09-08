<?php

    namespace Main\FrontBundle\Listener;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Back\DashBundle\Common\Tools;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
class ExceptionListener {
    protected $templating;
    protected $kernel;

    public function __construct(EngineInterface $templating, $kernel)
    {
        $this->templating = $templating;
        $this->kernel = $kernel;
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        // provide the better way to display a enhanced error page only in prod environment, if you want
        if ('prod' == $this->kernel->getEnvironment()) {
            // exception object
            $exception = $event->getException();

            // new Response object
            $response = new Response();
            $request = $event->getRequest();
            //$session = $request->getSession();
            //$parameter = $this->router->match($request->getPathInfo());
            $path = explode("/", $request->getPathInfo());

            // set response content
           if(isset($path[1]) && $path[1]=="dash"){
               $response->setContent(
                   $this->templating->render(
                       'TwigBundle:Exception:errorback.html.twig',
                       array('exception' => $exception)
                   )
               );
           }else{
            $response->setContent(
                $this->templating->render(
                    'TwigBundle:Exception:errorfront.html.twig',
                    array('exception' => $exception)
                )
            );
           }
            // HttpExceptionInterface is a special type of exception
            // that holds status code and header details
            if ($exception instanceof HttpExceptionInterface) {
                $response->setStatusCode($exception->getStatusCode());
                $response->headers->replace($exception->getHeaders());
            } else {
                $response->setStatusCode(500);
            }

            // set the new $response object to the $event
            $event->setResponse($response);
        }
    }
}