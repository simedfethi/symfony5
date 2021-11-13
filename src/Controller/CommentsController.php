<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class CommentsController extends AbstractController
{
    #[Route('/comments', name: 'comments')]
    public function index(): Response
    {
        $votes = [
            'jon',
            'mark',
            'anna',
        ];

        return $this->render('comments/index.html.twig', [
            'controller_name' => 'CommentsController',
            'votes' =>$votes
        ]);
    }

    /**
     * @Route("/comments/{id<\d+>}/vote/{direction<up|down>}", methods="POST")
     */
    public function commentvote( $id ,$direction,Environment $environment) :Response
    {

        if ($direction==='up')
        {
            $currentVoteCount=rand(7,100);
        }else {
            $currentVoteCount=rand(0,5);
        }
        return $this->json([
            'votes'=> $currentVoteCount
        ]);
    }

}
