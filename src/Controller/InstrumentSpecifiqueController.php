<?php

namespace App\Controller;

use App\Entity\InstrumentSpecifique;
use App\Form\InstrumentSpecifiqueType;
use App\Repository\InstrumentGeneraleRepository;
use App\Repository\InstrumentSpecifiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/instrument/specifique")
 */
class InstrumentSpecifiqueController extends AbstractController
{
    /**
     * @Route("/", name="instrument_specifique_index", methods={"GET"})
     */
    public function index(InstrumentSpecifiqueRepository $instrumentSpecifiqueRepository): Response
    {
        return $this->render('instrument_specifique/index.html.twig', [
            'instrument_specifiques' => $instrumentSpecifiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="instrument_specifique_new", methods={"GET","POST"})
     */
    public function new(Request $request,InstrumentspecifiqueRepository $instrumentspecifiqueRepository
       ,InstrumentGeneraleRepository $instrumentGeneraleRepository): Response
    {//* $numero=001;
       // $result=$instrumentspecifiqueRepository->findBy([],['id'=>'DESC'],1);
       // if($result){
       //     $numero=$result[0]->getNumero()+1;
        //    $numero=str_pad($numero, 3, "0", STR_PAD_LEFT);
        //}
       
        $instrumentspecifique = new Instrumentspecifique();
    //$instrumentspecifique->setNumero($numero);
        $form = $this->createForm(instrumentspecifiqueType::class, $instrumentspecifique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $code=$instrumentspecifique->getInstrumentGenerale()->getCode();
            $code.= "_";  
            $code.=$this->formatNbr(count($instrumentspecifiqueRepository->findBy(['instrumentGenerale'=>$instrumentspecifique->getInstrumentGenerale()->getId()]))+1);
            $instrumentspecifique->setNumero($code);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($instrumentspecifique);
            $entityManager->flush();

            return $this->redirectToRoute('instrument_specifique_index');
        }
        
        return $this->render('instrument_specifique/new.html.twig', [
            'instrumentspecifique' => $instrumentspecifique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="instrument_specifique_show", methods={"GET"})
     */
    public function show(InstrumentSpecifique $instrumentSpecifique): Response
    {
        return $this->render('instrument_specifique/show.html.twig', [
            'instrument_specifique' => $instrumentSpecifique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="instrument_specifique_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, InstrumentSpecifique $instrumentSpecifique): Response
    {
        $form = $this->createForm(InstrumentSpecifiqueType::class, $instrumentSpecifique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('instrument_specifique_index');
        }

        return $this->render('instrument_specifique/edit.html.twig', [
            'instrument_specifique' => $instrumentSpecifique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="instrument_specifique_delete", methods={"DELETE"})
     */
    public function delete(Request $request, InstrumentSpecifique $instrumentSpecifique): Response
    {
        if ($this->isCsrfTokenValid('delete'.$instrumentSpecifique->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($instrumentSpecifique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('instrument_specifique_index');
    }
    private  function formatNbr($nbr){
        if ($nbr < 10)
            return "00".$nbr;
        elseif ($nbr >= 10 && $nbr < 100 )
            return "0".$nbr;
        else
            return strval($nbr);
        }
}
