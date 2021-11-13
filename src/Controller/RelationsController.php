<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Video;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RelationsController extends AbstractController
{
    #[Route('/relations', name: 'relations')]
    public function index(): Response
    {
        $entitymanager=$this->getDoctrine()->getManager();
        $user = new User();
        $user->setName('Jone');
        $user->setLastname('martin');
        for($i=1;$i<20;$i++)
        {
            $video = new Video();
            $video->setTitle('video num:'.$i);
            $user->addVideo($video);
            $entitymanager->persist($video);
        }
        $entitymanager->persist($user);
        $entitymanager->flush();
        dump($user);
        return $this->render('relations/index.html.twig', [
            'controller_name' => 'RelationsController',
            'user'=>$user
        ]);
    }
    #[Route('/relations/delete/{id}', name: 'relations')]
    public function deleteuser($id=null)
    {
        $entitymanager=$this->getDoctrine()->getManager();
        $user = $entitymanager->getRepository(User::class)->find($id);

        $entitymanager->remove($user);

        $entitymanager->flush();
        //dump($user);
        dump();
        return new Response('200 OK');
    }
}
