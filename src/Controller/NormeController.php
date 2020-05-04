<?php

namespace App\Controller;

use App\Entity\Norme;
use App\Form\NormeType;
use App\Repository\NormeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/norme")
 */
class NormeController extends AbstractController
{
    /**
     * @Route("/", name="norme_index", methods={"GET"})
     */
    public function index(NormeRepository $normeRepository): Response
    {
        return $this->render('norme/index.html.twig', [
            'normes' => $normeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="norme_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $norme = new Norme();
        $form = $this->createForm(NormeType::class, $norme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($norme);
            foreach ($norme->getNormees() as $normees)
            {
                $entityManager->persist($normees);
            }
            $entityManager->flush();

            return $this->redirectToRoute('norme_index');
        }

        return $this->render('norme/new.html.twig', [
            'norme' => $norme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="norme_show", methods={"GET"})
     */
    public function show(Norme $norme): Response
    {
        return $this->render('norme/show.html.twig', [
            'norme' => $norme,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="norme_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Norme $norme): Response
    {
        $form = $this->createForm(NormeType::class, $norme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('norme_index');
        }

        return $this->render('norme/edit.html.twig', [
            'norme' => $norme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="norme_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Norme $norme): Response
    {
        if ($this->isCsrfTokenValid('delete'.$norme->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($norme);
            $entityManager->flush();
        }

        return $this->redirectToRoute('norme_index');
    }
}
