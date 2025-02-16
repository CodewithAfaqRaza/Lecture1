<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Entity\Job;
use App\Entity\JobApplication;
use App\Form\JobApplicationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class JobApplicationController extends AbstractController
{
    #[Route('/job/application/new', name: 'app_job_application_new')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {

      $form =   $this->createForm(JobApplicationType::class);
      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()){
        // dd($form->getData());
        $data =$form->getData();
        $job = $data['job'];
        $candidate = $data['candidate'];

        $job->addCandidate($candidate);
        $entityManager->persist($job);
        $entityManager->flush();
        $this->addFlash('success','You have Successfully applied for the job');
       return $this->redirectToRoute('app_job_application_new');


      }
        return $this->render('job_application/index.html.twig', [
            'form' => $form,
        ]);
    }
    #[Route('/job/application/cover', name: 'app_job_application_cover')]
    public function cover(Request $request, EntityManagerInterface $entityManager)
    {
     $job = new Job;
     $job->setTitle("Full Stack Developer Required");
       $entityManager->persist($job);

       $candidate = new Candidate;

       $candidate->setName("Bilal");
       $candidate->setFathername("khan");
       $candidate->setEmail("khan");
       $entityManager->persist($candidate);

       $jobApplication = new JobApplication;

       $jobApplication->setJob($job);

       $jobApplication->setCandidate($candidate);
       $jobApplication->setCoverLatter("I'm Very poor i really need this job");

       $entityManager->persist($jobApplication);

       $entityManager->flush();

       $this->redirectToRoute('app_job_application_cover');
     return  new  Response("You have Successfully Applied for the job ");
    
    }
}