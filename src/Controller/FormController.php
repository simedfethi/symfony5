<?php

namespace App\Controller;

use App\Entity\Video;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\VideoformType;
class FormController extends AbstractController
{
    #[Route('/form', name: 'form')]
    public function index(Request $request): Response
    {
        $video= new Video();
        $form= $this->createForm(VideoformType::class,$video);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            dump($form->getData());
            // or persist entitiesmanager to database
        }
        return $this->render('form/index.html.twig', [
            'controller_name' => 'FormController',
            'form'=>$form->createView(),
        ]);
    }
}
