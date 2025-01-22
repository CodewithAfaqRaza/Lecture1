<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloController extends AbstractController{
    #[Route('/welcome/{name}',name:'welcome',methods:'get')]

    public function welcome(string $name){
        return $this->render("hello/hello.html.twig",['name'=>$name]);
        // return new Response('Welcome to Symfony!'. $name);
    }
    #[Route('/about')]

    public function about(){
        return $this->render("hello/about.html.twig");
    }
    #[Route('multiply/{a<\d+>}/{b<\d+>}',name:"multiply")]
    public function multiply( $a, $b){
        $result = $a * $b;
        return $this->render("hello/multiply.html.twig",['result'=>$result]);
    }
}