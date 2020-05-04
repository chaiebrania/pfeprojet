<?php

namespace App\Controller;

use App\Entity\Normeinstrument;
use App\Form\NormeinstrumentType;
use App\Repository\NormeinstrumentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/normeinstrument")
 */
class NormeinstrumentController extends AbstractController
{
    /**
     * @Route("/", name="normeinstrument_index", methods={"GET"})
     */
    public function index(NormeinstrumentRepository $normeinstrumentRepository): Response
    {
        return $this->render('normeinstrument/index.html.twig', [
            'normeinstruments' => $normeinstrumentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="normeinstrument_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $normeinstrument = new Normeinstrument();
        $form = $this->createForm(NormeinstrumentType::class, $normeinstrument);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($normeinstrument);
            $entityManager->flush();

            return $this->redirectToRoute('normeinstrument_index');
        }

        return $this->render('normeinstrument/new.html.twig', [
            'normeinstrument' => $normeinstrument,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="normeinstrument_show", methods={"GET"})
     */
    public function show(Normeinstrument $normeinstrument): Response
    {
        return $this->render('normeinstrument/show.html.twig', [
            'normeinstrument' => $normeinstrument,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="normeinstrument_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Normeinstrument $normeinstrument): Response
    {
        $form = $this->createForm(NormeinstrumentType::class, $normeinstrument);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('normeinstrument_index');
        }

        return $this->render('normeinstrument/edit.html.twig', [
            'normeinstrument' => $normeinstrument,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="normeinstrument_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Normeinstrument $normeinstrument): Response
    {
        if ($this->isCsrfTokenValid('delete'.$normeinstrument->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($normeinstrument);
            $entityManager->flush();
        }

        return $this->redirectToRoute('normeinstrument_index');
    }
}
