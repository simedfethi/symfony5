<?php

namespace App\Controller;

use App\Entity\User;
use App\Services\GiftsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'product')]
    public function index()
    {

        return $this->render(
            'head.html.twig',[
                'controller_name'=>'productcontroller',
                ]
            );
    }
    #[Route('/productapi', name: 'productapi')]
    public function productapi()
    {
        return $this->json(
            [
                'user' => 'fethi',
                'password' => '123'
            ]
        );
    }
    #[Route('/redirect', name: 'redirect')]
    public function RedirectToGoogle()
    {
      return  $this->redirect('http://google.com');
    }

    #[Route('/redirect2', name: 'redirect2')]
    public function Redirect2()
    {
        return $this->redirectToRoute('productapi');
    }
    #[Route('/productlist', name: 'productlist')]
    public function productList(GiftsService $giftsService)
    {
        $entityManager=$this->getDoctrine()->getManager();
        $user = new User();
        $user->setName('AAAAAAAAA');
        $user->setLastname('gggggggggg');
        //$entityManager->persist($user);
        //$entityManager->flush();
        //$products=['product1','product2','product3'];
        $users=$this->getDoctrine()->getRepository(User::class)->findAll();
        //$gifts=['gift1','gift2','piano','money','flowers','ddfdfd','fffff','fffdf','ffdsf','34'];
        //shuffle($gifts);

        $this->addFlash(
            'notice',
            'Your product saved'
        );
        $this->addFlash(
            'warning','this is a warning msg'
        );
        $this->addFlash(
            'warning','this is a warning msg2'
        );


        $gifts=$giftsService->gifts;
        return $this->render('productlist.html.twig',[
            'controller_name'=>'productlist',
            'users'=>$users ,
            'random_gift' => $gifts
        ]);

    }
    /**
     * @Route("/blog/{page?}",name="blog_list",requirements={"page":"\d+"})
     */
    public function blogList()
    {
        return new Response('optional parameter required');
    }
    /**
     * @Route(
     *     "/articles/{_locale}/{year}/{category}",name="article_list",
     *     defaults={"category":"computers"},
     *     requirements={"page":"\d+",
     *     "_locale":"en|fr" ,
     *     "category":"computers|rtv",
     *     "year":"\d+"
     *     }
     *     )
     */
    public function articleList()
    {
        return new Response('optional parameter required');
    }

}
