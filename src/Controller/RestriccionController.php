<?php

namespace App\Controller;

use App\Entity\Restriccion;
use App\Form\RestriccionType;
use App\Repository\RestriccionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/restriccion')]
class RestriccionController extends AbstractController
{
    #[Route('/', name: 'restriccion_index', methods: ['GET'])]
    public function index(RestriccionRepository $restriccionRepository): Response
    {
        return $this->render('restriccion/index.html.twig', [
            'restriccions' => $restriccionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'restriccion_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $restriccion = new Restriccion();
        $form = $this->createForm(RestriccionType::class, $restriccion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($restriccion);
            $entityManager->flush();

            return $this->redirectToRoute('restriccion_index');
        }

        return $this->render('restriccion/new.html.twig', [
            'restriccion' => $restriccion,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'restriccion_show', methods: ['GET'])]
    public function show(Restriccion $restriccion): Response
    {
        return $this->render('restriccion/show.html.twig', [
            'restriccion' => $restriccion,
        ]);
    }

    #[Route('/{id}/edit', name: 'restriccion_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Restriccion $restriccion): Response
    {
        $form = $this->createForm(RestriccionType::class, $restriccion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('restriccion_index');
        }

        return $this->render('restriccion/edit.html.twig', [
            'restriccion' => $restriccion,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'restriccion_delete', methods: ['POST'])]
    public function delete(Request $request, Restriccion $restriccion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$restriccion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($restriccion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('restriccion_index');
    }
}
