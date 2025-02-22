<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

final class LoginController2 extends AbstractController
{
    #[Route('/login2', name: 'app_login2')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        $lastUser = $authenticationUtils->getLastUsername();
        $error = $authenticationUtils->getLastAuthenticationError();
        return $this->render('login/index2.html.twig', [
            'last_user' => $lastUser,
            'error'=>$error
        ]);
    }
}