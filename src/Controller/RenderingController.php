<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RenderingController extends AbstractController
{
    #[Route('/rendering', name: 'rendering')]
    public function index(): Response
    {
        return $this->render('rendering/index.html.twig', [
            'controller_name' => 'RenderingController',
        ]);
    }
    public function Postrender($number = 3)
    {
        $posts=['post1','post2','post3','post4'];
        return $this->render('rendering/partial.html.twig', [
            'controller_name' => 'RenderingController',
            'posts'=>$posts
        ]);
    }
}
