<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExceptionController extends AbstractController
{
    #[Route('/exception', name: 'exception')]
    public function index(Request $request): Response
    {
        $users=$this->getDoctrine()->getRepository(User::class)->findAll();
        if (count($users)>1)
        {
            throw  $this->createNotFoundException('User list > 1');
        }
        return $this->render('exception/index.html.twig', [
            'controller_name' => 'ExceptionController',
        ]);
    }
}
