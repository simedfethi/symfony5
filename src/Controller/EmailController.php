<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmailController extends AbstractController
{
    #[Route('/email', name: 'email')]
    public function index(Request $request,\Swift_Mailer $swiftmailer): Response
    {
        $message=(new \Swift_Message('hello message'))
        ->setFrom('simedfethi@gmail.com')
        ->setTo('ikramus.btfs@gmail.com')
        ->setBody(
            $this->renderView(
            'emails/registration.html.twig',
                [
                    'name' => 'robert',
                    'lastname'=>' pattinson'
                ]
            ),
            'text/html'
        );
        $swiftmailer->send($message);
        return $this->render('email/index.html.twig', [
            'controller_name' => 'EmailController',
        ]);
    }
}
