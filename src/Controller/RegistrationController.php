<?php

namespace App\Controller;

use App\Entity\SecurityUser;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
class RegistrationController extends AbstractController
{
    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }
    #[Route('/registration/register', name: 'registration')]
    public function index(Request $request,UserPasswordEncoderInterface $hasher): Response
    {
        $entitiesmanager=$this->getDoctrine()->getManager();

        $user=new SecurityUser();
        $form= $this->createForm(RegistrationFormType::class,$user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $encodedpassword=$hasher->encodePassword($user,$form->get('password')->getData());

            $user->setPassword($encodedpassword);
            $user->setEmail($form->get('email')->getData());
            $user->setRoles(['ROLE_ADMIN']);
            $entitiesmanager->persist($user);
            $entitiesmanager->flush();
            dump($user);
            return $this->redirectToRoute('registration_home');
        }
        return $this->render('registration/index.html.twig', [
            'controller_name' => 'RegistrationController',
            'form'=>$form->createView(),
        ]);
    }
    #[Route('/registration/registrationhome', name: 'registration_home')]
    public function regitrationhome(Request $request): Response
    {

        return new Response('Registration OK');
    }
    /**
     * @Route("/login", name="login")
     */
    public function login (AuthenticationUtils $authenticationUtils)
    {

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('registration/login.html.twig', [
            'controller_name' => 'RegistrationloginController',
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }
}
