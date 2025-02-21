<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

final class RegController extends AbstractController
{
    #[Route('/reg', name: 'app_reg')]
    public function index(UserPasswordHasherInterface $passHasher, UserRepository $userRepository): Response
    {
        $user = new User;
        $user->setEmail('afaq@gmail.com');
        $password = '12345';
       $hashPassword =  $passHasher->hashPassword($user,$password);
       $userRepository->upgradePassword($user, $hashPassword);
    //    $userRepository->$entityManager->persist($Entity);
         

        return $this->render('reg/index.html.twig', [
            'user' => $user,
        ]);
    }
}