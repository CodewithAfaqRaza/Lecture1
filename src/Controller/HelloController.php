<?php

namespace App\Controller;

use LDAP\Result;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloController{
    #[Route('/welcome/{name}',name:'welcome')]

    public function welcome(string $name){
        return new Response('Welcome to Symfony!'. $name);
    }
    #[Route('/about')]

    public function about(){
        return new Response('About to Symfony!');
    }
    #[Route('myltipy/{a<\d+>}/{b<\d+>}')]
    public function multipy( $a, $b){
        $result = $a * $b;
        return new Response("The result is ".$result);
    }
}