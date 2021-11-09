<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceBindingController extends AbstractController
{
    #[Route('/service/binding', name: 'service_binding')]
    public function index(LoggerInterface $logger): Response
    {
        // with autowiring no need to manually configure services.
        $logger->alert('test alert');

        return $this->render('service_binding/index.html.twig', [
            'controller_name' => 'ServiceBindingController',
        ]);
    }
}
