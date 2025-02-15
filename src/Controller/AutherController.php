<?php

namespace App\Controller;

use App\Entity\Auther;
use App\Form\AutherType;
use App\Repository\AutherRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/auther')]
final class AutherController extends AbstractController
{
    #[Route(name: 'app_auther_index', methods: ['GET'])]
    public function index(AutherRepository $autherRepository): Response
    {
        return $this->render('auther/index.html.twig', [
            'authers' => $autherRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_auther_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $auther = new Auther();
        $form = $this->createForm(AutherType::class, $auther);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($auther);
            $entityManager->flush();

            return $this->redirectToRoute('app_auther_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('auther/new.html.twig', [
            'auther' => $auther,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_auther_show', methods: ['GET'])]
    public function show(Auther $auther): Response
    {
        return $this->render('auther/show.html.twig', [
            'auther' => $auther,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_auther_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Auther $auther, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AutherType::class, $auther);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_auther_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('auther/edit.html.twig', [
            'auther' => $auther,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_auther_delete', methods: ['POST'])]
    public function delete(Request $request, Auther $auther, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$auther->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($auther);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_auther_index', [], Response::HTTP_SEE_OTHER);
    }
}
