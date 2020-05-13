<?php

//When we load a page, the first file that's executed is public/index.php.
//single Kernel can handle multiple requests inside just one PHP process. In fact, let's do that! 

//And this idea of handling multiple requests in Symfony is something that really does happen! It happens with sub-requests - a topic that we will cover later in this tutorial -
//and some people use an event loop in PHP to boot a single kernel and then handle many, real, HTTP requests.

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);

$request1 = Request::create('/login');
$request2 = Request::create('/register');
$response1 = $kernel->handle($request1);
$response2 = $kernel->handle($request2);


// httpkernal => insid vendor /symfony/http-kernal /httpkernal.php
// inside httpkernal there are handle() method that method called  handleRaw() method that use the requestStack to store all request 
//handleRaw() his is the Symfony framework.
//handleRaw() his is the Symfony framework.
//handleRaw() his is the Symfony framework.
//handleRaw() his is the Symfony framework.
//handleRaw() his is the Symfony framework.
//handleRaw() his is the Symfony framework.


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// We've traced the code from the first file that's executed - public/index.php - all the way into this core HttpKernel class. Specifically,
// this handleRaw() method. These 50 lines of code are the entire framework.
// It somehow transforms a Request at the beginning into a Response at the end. The question is: how? What does it do to accomplish that?
//1- The RequestStack
// 2-Dispatching RequestEvent (kernel.request)
//3-Hello RouterListener
//4-What does Routing Return?

//1-The RequestStack: The first line uses something called a RequestStack: 
$this->requestStack->push($request) ;//The RequestStack is a small object that basically holds an array of Request objects

//2-Dispatching RequestEvent (kernel.request): the first event is triggered. It's called KernelEvents::REQUEST, which is a constant that really means the string: kernel.request
$event = new RequestEvent($this, $request, $type);
$this->dispatcher->dispatch($event,KernelEvents::REQUEST);

//3-RouterListener.php
function getSubscribedEvents()
{
    return [
        KernelEvents::REQUEST => [['onKernelRequest', 32]],
        KernelEvents::FINISH_REQUEST => [['onKernelFinishRequest', 0]],
        KernelEvents::EXCEPTION => ['onKernelException', -64],
    ];
}

function onKernelRequest(RequestEvent $event)
{
    try {
          // matching a request is more powerful than matching a URL path + context, so try that first
          if ($this->matcher instanceof RequestMatcherInterface) {
            $parameters = $this->matcher->matchRequest($request);
        } else {
            $parameters = $this->matcher->match($request->getPathInfo());
        }
        dd($parameters); // the output is array '_route'=>"post",'_controller'=>'PostController',"id or slug"=>"1"
    } catch (ResourceNotFoundException $e) {
    }
}
