<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ForwardController extends AbstractController
{
    #[Route('/forward', name: 'forward')]
    public function index(): Response
    {
       $res=$this->forward(
         'App\Controller\ForwardController::secondmethod',
           array('page'=>10)
       );
       return $res;
    }

    public function secondmethod($page)
    {
        return new Response('forwarding method'.$page);
    }
}
