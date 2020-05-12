<?php
namespace App\Event;

use App\Entity\User;
use Symfony\Contracts\EventDispatcher\Event;
class UserRegisterEvent extends Event{
    const Name='user.register';
    
    private $userRegister;

    public function __construct(User $userRegister)
    {
        $this->userRegister=$userRegister;
    }
    public function getUserRegister(){
        return $this->userRegister;

    }
}

//and inside controller 
  //EventDispatcherInterface $eventDispatcher;

    1-//create instance from event and pass user as information 
    $userRegisterEvent=new UserRegisterEvent($user); // pass user as argument or pass mor argument or information depend how we create event and constructor

    2-//dispatch the event using EventDispatcherInterface method dispatch(event object ,event name); 
    $this->eventDispatcher->dispatch($userRegisterEvent,UserRegisterEvent::Name); 