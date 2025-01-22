<?php

namespace App\Controller;

use App\Respository\StudentRespository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Psr\Log\LoggerInterface; 

class HelloController extends AbstractController{
    #[Route('/welcome/{name}',name:'welcome',methods:'get')]

    public function welcome(string $name){

        return $this->render("hello/hello.html.twig",['name'=>$name]);
        // return new Response('Welcome to Symfony!'. $name);
    }
    #[Route('/about')]
// 
    public function about(LoggerInterface $logger){
        $logger->info("We have just access the About Us page");
        return $this->render("hello/about.html.twig");
    }
    #[Route('multiplyNumbers/{a<\d+>}/{b<\d+>}',name:"multiply")]
    public function multiply( $a, $b){
        $result = $a * $b;
        return $this->render("hello/multiply.html.twig",['result'=>$result]);
    }
    #[Route('getStudents')]
    public function getStudent(StudentRespository $repo){
        $students = $repo->StudentsData();

        return $this->render('student/student.html.twig',['students'=>$students]);
    }
}