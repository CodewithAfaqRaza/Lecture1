<?php

namespace App\Controller;

use App\Entity\Teacher;
use App\Form\TeacherType;
use App\Repository\TeacherRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/teacher')]
class TeacherController extends AbstractController{

 #[Route('/showall',name:'show_all')]

 public function showall(Request $request, TeacherRepository $teacherRepository){
   //  $teachers = $teacherRepository->findAll();
      $teachers = $teacherRepository->findAllByPagerFanta();
      $teachers->setMaxPerPage(4);
      $teachers->setCurrentPage($request->query->get('page',1));
      return $this->render('/teacher/showall.html.twig',['teachers'=>$teachers]);
 }

 #[Route('/showone/{id<\d+>}',name:'show_one')]

 public function showOne(TeacherRepository $teacherRepository,$id){
    $teacher = $teacherRepository->find($id);
    return $this->render('teacher/showone.html.twig',['teacher'=>$teacher]);
 }
 #[Route('/new',name:'new_one')]

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
 #[Route('/update/{id<\d+>}',name:'teacher_update')]

 public function update(TeacherRepository $teacherRepository,$id){
    $teacher  = $teacherRepository->find($id);
        $teacher->setName("Afaq Raza");
        

        $teacherRepository->add($teacher, true);

      

    return $this->render('teacher/update.html.twig',['teacher'=>$teacher]);
 }
 #[Route('/delete/{id<\d+>}',name:'teacher_delete')]

 public function delete(TeacherRepository $teacherRepository,$id){
    // dd($teacherRepository);
    $teacher  = $teacherRepository->find($id);
        $teacherRepository->remove($teacher);
    return $this->render('teacher/delete.html.twig',['teacher'=>$teacher]);
 }
 #[Route('/create',name:'create_teacher')]
 public function create(Request $request,TeacherRepository $teacherRepository){

   // dd("The Create Route has been accessed");
   $teacher = new Teacher();
  $form =  $this->createFormBuilder($teacher)
   ->add('name',TextType::class)
   ->add('fathername',TextType::class)
   ->add('email',EmailType::class)
   ->add('address',TextareaType::class)
   ->add('contactNumber', IntegerType::class)
   ->add('save',SubmitType::class,['label'=>'Add Teacher'])
   ->getForm();
   $form->handleRequest($request);
   if($form->isSubmitted() && $form->isValid()){
      // dd($form->getData());
      // $formData = $form->getData();
      $teacherRepository->add($teacher,true);
      $this->addFlash('success', "The Teacher {$teacher->getName()} has been added SuccessFully");
      return $this->redirectToRoute('show_all');

   }
   return $this->render('teacher/create.html.twig',['form' =>$form]);

 }
 #[Route('/create/class',name:'create_teacher_class')]
 public function createClass(Request $request,TeacherRepository $teacherRepository){

   // dd("The Create Route has been accessed");
   $teacher = new Teacher();
   $form = $this->createForm(TeacherType::class);
   
   $form->handleRequest($request);
   if($form->isSubmitted() && $form->isValid()){

      $teacherRepository->add($teacher,true);
      $this->addFlash('success', "The Teacher {$teacher->getName()} has been added SuccessFully");
      return $this->redirectToRoute('show_all');

   }
   return $this->render('teacher/createclass.html.twig',['form' =>$form]);

 }
   
}