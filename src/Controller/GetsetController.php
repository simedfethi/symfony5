<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GetsetController extends AbstractController
{
    #[Route('/getset', name: 'getset')]
    public function index(Request $request): Response
    {
        if( $request->isXmlHttpRequest())
        {
          //ajax  request
        }
       $file=$request->files->get('file');
     $page= $request->query->get('page','default');
        $host= $request->server->get('HTTP_HOST');
      exit($host);
        return $this->render('getset/index.html.twig', [
            'controller_name' => 'GetsetController',
        ]);
    }
}
