<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/registration', name: 'app_registration')]
    public function index(): Response
    {
        return $this->render('registration/index.html.twig', [
            'controller_name' => 'RegistrationController',
        ]);
    }
    
    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasherInterface, 
    EntityManagerInterface $entityManager, CategoryRepository $brand): Response
    {
        
        $user=new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        $br = $brand->findAll();

        if($form->isSubmitted()&& $form->isValid()){
            //encodde the plain password
            $user->setPassword(
            $userPasswordHasherInterface->hashPassword(
                $user,
                $form->get('password')->getData()

                )
            );
            $user->setRoles(['ROLE_USER']);

            $entityManager->persist($user);
            $entityManager->flush();
            //do anything else you need here, like send an email

            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/index.html.twig', [
            'registrationForm' =>$form->createView(),
            'brand'=>$br,
        ]);
    }
    



    
    
}
