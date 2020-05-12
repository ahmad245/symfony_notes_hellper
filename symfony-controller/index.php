<?php

// Security
/**
 * @Security("is_granted('ROLE_USER')")
 * @Security(" is_granted('ROLE_ADMIN') or (is_granted('ROLE_USER')  and user==post.getUser())  ")
 */
////////////////////////////////////////////////////////ParamConverter////////////////////////////////////////////////////////////////////////////////////////////////////
//ParamConverter    use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
/**
   * @Route("/comment/reply/{id}/{postId}", name="comment_reply")
   * @ParamConverter("comment", options={"exclude": {"postId"}})
   */
  public function add(Comment $comment, $postId, Request $req)

  /**
   * @Route("/comment/reply/{id}/{postId}/edit", name="comment_reply_edit")
   *  @ParamConverter("replyComment", options={"exclude": {"postId"}})
   */
  public function edit(CommentReply $replyComment, $postId, Request $req)

////////////////////////////////////////////////////////redirectToRoute render////////////////////////////////////////////////////////////////////////////////////////////////////
redirectToRoute('routeName',['id'=>10]);
render('template',['form'=>form->createView(),'post'=>$post]);
/////////////////////////////////////////////////////////////////////json/////////////////////////////////////////////////////////////////////////////////////////
return $this->json($departments,200,[],['groups'=>['department']]);
in entity  use Symfony\Component\Serializer\Annotation\Groups;
@Groups("department")

return $this->json($repo->searchByIdentity($user),200,[],['groups'=>['user']]);
@Groups("user")

from json to php 
$data = json_decode($request->getContent(), true);
/////////////////////////////////////////////////////////////////////classes/////////////////////////////////////////////////////////////////////////////////////////
//classes utile :
1- AuthenticationUtils;
2- EventDispatcherInterface;
3- EntityManagerInterface ;
4-UserPasswordEncoderInterface ;
5-Request $req;
6- EventSubscriberInterface must implement  getSubscribedEvents();
7-EventSubscriber must implement  getSubscribedEvents();
8- OnFlushEventArgs $args;
/////////////////////////////////////////////////////////////////////utile/////////////////////////////////////////////////////////////////////////////////////////
// utile 
1- AuthenticationUtils $util
$error = $util->getLastAuthenticationError();

/////////////////////////////////////////////////////////////////////////Event/////////////////////////////////////////////////////////////////////////////////////
// EventDispatche=>build in symfony and UserRegisterEvent=>custom envent 
2- EventDispatcherInterface $eventDispatcher;

    1-//create instance from event and pass user as information 
    $userRegisterEvent=new UserRegisterEvent($user); // pass user as argument or pass mor argument or information depend how we create event and constructor

    2-//dispatch the event using EventDispatcherInterface method dispatch(event object ,event name); 
    $this->eventDispatcher->dispatch($userRegisterEvent,UserRegisterEvent::Name); 


    $em = $args->getEntityManager();
    $uow = $em->getUnitOfWork();
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
// entity manager
3- EntityManagerInterface $em;
 1 $em->persist();
 2 $em->flush();
 3 $em->remove($comment);
 $em->getClassMetadata(LikeNotification::class)
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 // password
4- UserPasswordEncoderInterface $encode;
    $user->setPassword($encode->encodePassword($user,$user->getPassword()));
    $user->setConfirmationToken($this->tokenGenerator->getRandomSecureToken());
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
6- EventSubscriberInterface this is interface must implement an method getSubscribedEvents();
    getSubscribedEvents()
            // it is can listen one or more event 
                //name of event and the method we should execute when this event trigger
                return [
                    UserRegisterEvent::Name=>'onRegister',
                    UserResetPasswordEvent::Name=>'onResetPassword'
                ];
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
7 _EventSubscriber must implement  getSubscribedEvents();
 /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return string[]
     */
    getSubscribedEvents()
        {
            return [
                Events::onFlush
            ];
        }
 or 
  getSubscribedEvents()
    {
        return [
            Events::postPersist,
            Events::postRemove,
            Events::postUpdate,
        ];
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $em = $args->getEntityManager();
    $uow = $em->getUnitOfWork();
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    

