<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GlobalvarController extends AbstractController
{
    #[Route('/globalvar', name: 'globalvar')]
    public function index(): Response
    {
        return $this->render('globalvar/index.html.twig', [
            'controller_name' => 'GlobalvarController',
        ]);
    }
}
