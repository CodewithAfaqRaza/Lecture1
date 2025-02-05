<?php

namespace App\Controller;

use App\Entity\Teacher;
use App\Repository\TeacherRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class TeacherController extends AbstractController{

 #[Route('/teacher/showall',name:'show_all')]

 public function showall(TeacherRepository $teacherRepository){
    $teachers = $teacherRepository->findAll();
    return $this->render('/teacher/showall.html.twig',['teachers'=>$teachers]);
 }

 #[Route('/teacher/showone/{id<\d+>}',name:'show_one')]

 public function showOne(TeacherRepository $teacherRepository,$id){
    $teacher = $teacherRepository->find($id);
    return $this->render('teacher/showone.html.twig',['teacher'=>$teacher]);
 }
 #[Route('/teacher/new',name:'new_one')]

 public function new(TeacherRepository $teacherRepository){
    $teacher  = new Teacher;
        $teacher->setName("Afaq");
        $teacher->setFatherName("Shaukat");
        $teacher->setEmail("afaq@drupak.com");
        $teacher->setAddress("Peshawar");
        $teacher->setContactNumber(32301);

        $teacherRepository->add($teacher, true);



    return $this->render('teacher/new.html.twig',['teacher'=>$teacher]);
 }
 #[Route('/teacher/update/{id<\d+>}',name:'teacher_update')]

 public function update(TeacherRepository $teacherRepository,$id){
    $teacher  = $teacherRepository->find($id);
        $teacher->setName("Afaq Raza");
        

        $teacherRepository->add($teacher, true);

      

    return $this->render('teacher/update.html.twig',['teacher'=>$teacher]);
 }
 #[Route('/teacher/delete/{id<\d+>}',name:'teacher_delete')]

 public function delete(TeacherRepository $teacherRepository,$id){
    // dd($teacherRepository);
    $teacher  = $teacherRepository->find($id);
        $teacherRepository->remove($teacher);
    return $this->render('teacher/delete.html.twig',['teacher'=>$teacher]);
 }

}