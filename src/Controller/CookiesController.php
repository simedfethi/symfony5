<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CookiesController extends AbstractController
{
    #[Route('/cookies', name: 'cookies')]
    public function index(): Response
    {
        $users=$this->getDoctrine()->getRepository(User::class)->findAll();
        $cookies=new Cookie(
            'mycookies',
            'value',
             time()+(2*365*24*60*60)
        );
        $res= new Response();
        $res->headers->setCookie($cookies);
        $res->send();
        return $this->render('cookies/index.html.twig', [
            'controller_name' => 'CookiesController',
        ]);
    }
    #[Route('/cookies/clear', name: 'cookies_clear')]
    public function ClearCookies(): Response
    {

        $res= new Response();
        $res->headers->clearCookie('mycookies');
        $res->send();

        return $this->render('cookies/index.html.twig', [
            'controller_name' => 'CookiesController',
        ]);
    }
    #[Route('/cookies/getdata', name: 'cookies_getdata')]
    public function getCookies(Request $request,SessionInterface $session):Response
    {

        $users=$this->getDoctrine()->getRepository(User::class)->findAll();
           $session->set('sessionname','sessionvalue');
           //     $session->clear();
        return $this->render('cookies/index.html.twig', [
            'controller_name' => 'CookiesController',
        'session'=>$session->get('sessionname')
        ]);
    }
}
