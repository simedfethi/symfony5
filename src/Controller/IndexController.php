<?php
namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{

    public $logger;
    /**
     * IndexController constructor.
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger=$logger;
    }
    public function index()
    {
        $this->logger->info('I just got the logger');
        $this->logger->error('An error occurred');

        $this->logger->critical('I left the oven on!', [
            // include extra "context" info in your logs
            'cause' => 'in_hurry',
        ]);


        return new Response('<h1>Hello world </h1>');
    }

}
