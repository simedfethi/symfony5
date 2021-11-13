<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\DBAL\Statement;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CrudController extends AbstractController
{
    #[Route('/crud', name: 'crud')]
    public function index(): Response
    {
        $repository= $this->getDoctrine()->getRepository(User::class);

        $users=$repository->findAll();
        return $this->render('crud/index.html.twig', [
            'controller_name' => 'CrudController',
            'users'=>$users
        ]);

    }
    #[Route('/crud/find/{id}', name: 'crud_find')]
    public function findone($id): Response
    {
        $repository= $this->getDoctrine()->getRepository(User::class);

        $users=$repository->findBy(['id'=>$id],['id'=>'DESC']);

        //find user with id one
        //$user=$repository->find(1);
        $user=$repository->findOneBy(['name'=>'robert','id'=>1]);

        return $this->render('crud/index.html.twig', [
            'controller_name' => 'CrudController',
            'users'=>$users
        ]);

    }
    #[Route('/crud/update/{id?}', name: 'crud_update')]
    public function updateUser ($id=null)
    {
        $entitymanager=$this->getDoctrine()->getManager();

        $user = $entitymanager->getRepository(User::class)->find($id);
        if ($user ==null)
        {
            throw $this->createNotFoundException(
                'User not found' .$id
            );
        }else {
          $user->setName('SEAA');
          $entitymanager->flush();
        }
        $users=$entitymanager->getRepository(User::class)->findAll();
        return $this->render('crud/index.html.twig', [
            'controller_name' => 'CrudController',
            'users'=>$users
        ]);
    }
    #[Route('/crud/delete/{id?}', name: 'crud_delete')]
    public function deleteUser ($id=null)
    {
        $entitymanager=$this->getDoctrine()->getManager();

        $user = $entitymanager->getRepository(User::class)->find($id);
        if ($user ==null)
        {
            throw $this->createNotFoundException(
                'User not found' .$id
            );
        }else {
            $entitymanager->remove($user);
            $entitymanager->flush();
        }
        $users=$entitymanager->getRepository(User::class)->findAll();
        return $this->render('crud/index.html.twig', [
            'controller_name' => 'CrudController',
            'users'=>$users
        ]);
    }
    #[Route('/crud/rawsql', name: 'crud_raw')]
    public function rawSql (UserRepository $repository)
    {

         //$users=$repository->findAllGreaterThanPrice(10);
        $users=$repository->sqlraw(10);
         //$users=[];
        return $this->render('crud/index.html.twig', [
            'controller_name' => 'CrudController',
            'users'=>$users
        ]);
    }

    #[Route('/crud/user/{id}', name: 'crud_user')]
    public  function userwithvideos($id) :Response
    {
        $user=$this->getDoctrine()->getRepository(User::class)->userWithVideos($id);
        dump($user);
        $users=[];
        return $this->render('crud/index.html.twig',[
           'controller_name'=>'CrudController',
           'users' => $users
        ]);
    }


}
