<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DownloadController extends AbstractController
{
    #[Route('/download', name: 'download')]
    public function index()
    {
        //define parameters in services.yaml
        $path=$this->getParameter('download_directory');
        return  $this->file($path.'file.pdf');
    }
    #[Route('/download/redirect', name: 'downloadredirect')]
    public function redirecttest()
    {
         return $this->redirectToRoute('index',array('lang'=>'fr','page'=>10));
    }

}
