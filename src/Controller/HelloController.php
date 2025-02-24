<?php

namespace App\Controller;

use App\Respository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class HelloController extends AbstractController{
    #[Route('/welcome',name:'welcome',methods:'get')]

    public function welcome(){

        return $this->render("hello/hello.html.twig",);
        return new Response('Welcome to Symfony!');
    }
    #[Route('/about',name:"aboutPage")]
    // #[IsGranted('ROLE_USER')]
// 
    public function about(StudentRepository $repo){

          $this->denyAccessUnlessGranted('ROLE_ADMIN');
  
        $repo->StudentsData();
        return $this->render("hello/about.html.twig");
    }
    #[Route('multiplyNumbers/{a<\d+>}/{b<\d+>}',name:"multiply")]
    public function multiply( $a, $b){
        $result = $a * $b;
        return $this->render("hello/multiply.html.twig",['result'=>$result]);
    }
    #[Route('getStudents')]
    public function getStudent(StudentRepository $repo){
        $students = $repo->StudentsData();

        return $this->render('student/student.html.twig',['students'=>$students]);
    }
}