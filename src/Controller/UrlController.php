<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class UrlController extends AbstractController
{
    #[Route('/url', name: 'url')]
    public function index(): Response
    {

        return $this->render('url/index.html.twig', [
            'controller_name' => 'UrlController',
        ]);
    }
    #[Route('/url/generate/{page?}', name: 'url_generate')]
    public function generate($page , UrlGeneratorInterface $generator): Response
    {
       $url =$this->generateUrl(
           'url_generate',
           array('pa'=>$page,'lang'=>'fr'),
           $generator::ABSOLUTE_PATH
       );
        return new Response($url);
    }
}
