<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParamConverterController extends AbstractController
{
    #[Route('/param/converter/{id}', name: 'param_converter')]
    public function index(User $user): Response
    {
       // need sensio framwork extrabundle
        $users=[$user];
        return $this->render('param_converter/index.html.twig', [
            'controller_name' => 'ParamConverterController',
            'users'=>$users
        ]);
    }
}
