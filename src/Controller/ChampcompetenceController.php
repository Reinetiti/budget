<?php

namespace App\Controller;

use App\Entity\Champcompetence;
use App\Form\ChampcompetenceType;
use App\Repository\ChampcompetenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/champcompetence")
 */
class ChampcompetenceController extends AbstractController
{
    /**
     * @Route("/", name="champcompetence_index", methods={"GET"})
     */
    public function index(ChampcompetenceRepository $champcompetenceRepository): Response
    {
        // $champcompetences = $this->getDoctrine()
        //     ->getRepository(Champcompetence::class)
        //     ->findAll();

        return $this->render('champcompetence/index.html.twig', [
            'champcompetences' => $champcompetenceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="champcompetence_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $champcompetence = new Champcompetence();
        $form = $this->createForm(ChampcompetenceType::class, $champcompetence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($champcompetence);
            $entityManager->flush();

            return $this->redirectToRoute('champcompetence_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('champcompetence/new.html.twig', [
            'champcompetence' => $champcompetence,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{competenceid}", name="champcompetence_show", methods={"GET"})
     */
    public function show(Champcompetence $champcompetence): Response
    {
        return $this->render('champcompetence/show.html.twig', [
            'champcompetence' => $champcompetence,
        ]);
    }

    /**
     * @Route("/{competenceid}/edit", name="champcompetence_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Champcompetence $champcompetence): Response
    {
        $form = $this->createForm(ChampcompetenceType::class, $champcompetence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('champcompetence_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('champcompetence/edit.html.twig', [
            'champcompetence' => $champcompetence,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{competenceid}", name="champcompetence_delete", methods={"POST"})
     */
    public function delete(Request $request, Champcompetence $champcompetence): Response
    {
        if ($this->isCsrfTokenValid('delete'.$champcompetence->getCompetenceid(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($champcompetence);
            $entityManager->flush();
        }

        return $this->redirectToRoute('champcompetence_index', [], Response::HTTP_SEE_OTHER);
    }
}
