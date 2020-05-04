<?php

namespace App\Controller;

use App\Entity\InstrumentGenerale;
use App\Form\InstrumentGeneraleType;
use App\Repository\InstrumentGeneraleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/instrument/generale")
 */
class InstrumentGeneraleController extends AbstractController
{
    /**
     * @Route("/", name="instrument_generale_index", methods={"GET"})
     */
    public function index(InstrumentGeneraleRepository $instrumentGeneraleRepository): Response
    {
        return $this->render('instrument_generale/index.html.twig', [
            'instrument_generales' => $instrumentGeneraleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="instrument_generale_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $instrumentGenerale = new InstrumentGenerale();
        $form = $this->createForm(InstrumentGeneraleType::class, $instrumentGenerale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($instrumentGenerale);
            $entityManager->flush();

            return $this->redirectToRoute('instrument_generale_index');
        }

        return $this->render('instrument_generale/new.html.twig', [
            'instrument_generale' => $instrumentGenerale,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="instrument_generale_show", methods={"GET"})
     */
    public function show(InstrumentGenerale $instrumentGenerale): Response
    {
        return $this->render('instrument_generale/show.html.twig', [
            'instrument_generale' => $instrumentGenerale,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="instrument_generale_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, InstrumentGenerale $instrumentGenerale): Response
    {
        $form = $this->createForm(InstrumentGeneraleType::class, $instrumentGenerale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('instrument_generale_index');
        }

        return $this->render('instrument_generale/edit.html.twig', [
            'instrument_generale' => $instrumentGenerale,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="instrument_generale_delete", methods={"DELETE"})
     */
    public function delete(Request $request, InstrumentGenerale $instrumentGenerale): Response
    {
        if ($this->isCsrfTokenValid('delete'.$instrumentGenerale->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($instrumentGenerale);
            $entityManager->flush();
        }

        return $this->redirectToRoute('instrument_generale_index');
    }
}
