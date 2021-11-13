<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CacheController extends AbstractController
{
    #[Route('/cache', name: 'cache')]
    public function index(): Response
    {
        $cache= new FilesystemAdapter();
        $posts = $cache->getItem('data.posts');
           if (!$posts->isHit())
           {
               $postst=['post1','post2','post3'];
               dump('connected to database');
               $posts->set(serialize($postst));
               $posts->expiresAfter(5);
               $cache->save($posts);
           }
        dump(unserialize($posts->get()));
        return $this->render('cache/index.html.twig', [
            'controller_name' => 'CacheController',
        ]);
    }
}
