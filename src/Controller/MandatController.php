<?php

namespace App\Controller;

use App\Entity\Mandat;
use App\Form\MandatType;
use App\Repository\MandatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/mandat")
 */
class MandatController extends AbstractController
{
    /**
     * @Route("/", name="mandat_index", methods={"GET"})
     */
    public function index(MandatRepository $mandatRepository): Response
    {
        // $mandats = $this->getDoctrine()
        //     ->getRepository(Mandat::class)
        //     ->findAll();

        return $this->render('mandat/index.html.twig', [
            'mandats' => $mandatRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="mandat_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $mandat = new Mandat();
        $form = $this->createForm(MandatType::class, $mandat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($mandat);
            $entityManager->flush();

            return $this->redirectToRoute('mandat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mandat/new.html.twig', [
            'mandat' => $mandat,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{numMandat}", name="mandat_show", methods={"GET"})
     */
    public function show(Mandat $mandat): Response
    {
        return $this->render('mandat/show.html.twig', [
            'mandat' => $mandat,
        ]);
    }

    /**
     * @Route("/{numMandat}/edit", name="mandat_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Mandat $mandat): Response
    {
        $form = $this->createForm(MandatType::class, $mandat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mandat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mandat/edit.html.twig', [
            'mandat' => $mandat,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{numMandat}", name="mandat_delete", methods={"POST"})
     */
    public function delete(Request $request, Mandat $mandat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mandat->getNumMandat(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($mandat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('mandat_index', [], Response::HTTP_SEE_OTHER);
    }
}
