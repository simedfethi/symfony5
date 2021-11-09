<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ErrorController extends AbstractController
{
    #[Route('/error', name: 'error')]
    public function index(): Response
    {
        //set env to prod route vers bundles exceptions
        return $this->rendfdfdfdfder('error/index.html.twig', [
            'controller_name' => 'ErrorController',
        ]);
    }
}
