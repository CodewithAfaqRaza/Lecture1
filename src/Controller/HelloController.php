<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloController{
    #[Route('/welcome')]
    public function welcome(){
        return new Response('Welcome to Symfony!');
    }
}