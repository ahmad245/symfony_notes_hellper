<?php

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Psr\Log\LoggerInterface;

class UserAgentSubscriber  implements EventSubscriberInterface
{
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public static function getSubscribedEvents(){
        return [
            //'kernel.request' or RequestEvent
            RequestEvent::class => 'onKernelRequest'
        ];
    }

    public function onKernelRequest(RequestEvent $event){
        $this->logger->info('I\'m logging SUPER early on the request!');
        
        
        dd($event);// this event contains the Request object because if you're listening to this very early event in Symfony... there's  a good chance that you might want to use the Request object to do something.
        $request = $event->getRequest();
        $userAgent = $request->headers->get('User-Agent');
        $this->logger->info(sprintf('The User-Agent is "%s"', $userAgent));
        // we can modify the response in RequestEvent there are method setResponse
        $event->setResponse(new Response(
            'Ah, ah, ah: you didn\'t say the magic word'
        ));
    }

}