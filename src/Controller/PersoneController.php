<?php

namespace App\Controller;

use App\Entity\Persone;
use App\Form\PersoneType;
use App\Repository\PersoneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/persone")
 */
class PersoneController extends AbstractController
{
    /**
     * @Route("/", name="persone_index", methods={"GET"})
     */
    public function index(PersoneRepository $personeRepository): Response
    {
        return $this->render('persone/index.html.twig', [
            'persones' => $personeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="persone_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $persone = new Persone();
        $form = $this->createForm(PersoneType::class, $persone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($persone);
            $entityManager->flush();

            return $this->redirectToRoute('persone_index');
        }

        return $this->render('persone/new.html.twig', [
            'persone' => $persone,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="persone_show", methods={"GET"})
     */
    public function show(Persone $persone): Response
    {
        return $this->render('persone/show.html.twig', [
            'persone' => $persone,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="persone_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Persone $persone): Response
    {
        $form = $this->createForm(PersoneType::class, $persone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('persone_index');
        }

        return $this->render('persone/edit.html.twig', [
            'persone' => $persone,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="persone_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Persone $persone): Response
    {
        if ($this->isCsrfTokenValid('delete'.$persone->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($persone);
            $entityManager->flush();
        }

        return $this->redirectToRoute('persone_index');
    }
}
