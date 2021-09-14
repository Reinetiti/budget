<?php

namespace App\Controller;

use App\Entity\ProjetMandat;
use App\Form\ProjetMandatType;
use App\Repository\ProjetMandatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/projet/mandat")
 */
class ProjetMandatController extends AbstractController
{
    /**
     * @Route("/", name="projet_mandat_index", methods={"GET"})
     */
    public function index(ProjetMandatRepository $projetMandatRepository): Response
    {
        // $projetMandats = $this->getDoctrine()
        //     ->getRepository(ProjetMandat::class)
        //     ->findAll();

        return $this->render('projet_mandat/index.html.twig', [
            'projet_mandats' => $projetMandatRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="projet_mandat_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $projetMandat = new ProjetMandat();
        $form = $this->createForm(ProjetMandatType::class, $projetMandat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($projetMandat);
            $entityManager->flush();

            return $this->redirectToRoute('projet_mandat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('projet_mandat/new.html.twig', [
            'projet_mandat' => $projetMandat,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{numProjet}", name="projet_mandat_show", methods={"GET"})
     */
    public function show(ProjetMandat $projetMandat): Response
    {
        return $this->render('projet_mandat/show.html.twig', [
            'projet_mandat' => $projetMandat,
        ]);
    }

    /**
     * @Route("/{numProjet}/edit", name="projet_mandat_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ProjetMandat $projetMandat): Response
    {
        $form = $this->createForm(ProjetMandatType::class, $projetMandat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projet_mandat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('projet_mandat/edit.html.twig', [
            'projet_mandat' => $projetMandat,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{numProjet}", name="projet_mandat_delete", methods={"POST"})
     */
    public function delete(Request $request, ProjetMandat $projetMandat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$projetMandat->getNumProjet(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($projetMandat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('projet_mandat_index', [], Response::HTTP_SEE_OTHER);
    }
}
