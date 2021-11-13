<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class VideoCreatedSubscriber implements EventSubscriberInterface
{
    public function onKernelResponse(ResponseEvent $event)
    {
        $response= new Response('new response');
       // return $event->setResponse($response);
        // ...
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.response' => 'onKernelResponse',
        ];
    }
}
