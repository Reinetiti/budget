<?php

namespace App\Controller;

use App\Entity\Paragraphe;
use App\Form\ParagrapheType;
use App\Repository\ParagrapheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/paragraphe")
 */
class ParagrapheController extends AbstractController
{
    /**
     * @Route("/", name="paragraphe_index", methods={"GET"})
     */
    public function index(ParagrapheRepository $paragrapheRepository): Response
    {
        // $paragraphes = $this->getDoctrine()
        //     ->getRepository(Paragraphe::class)
        //     ->findAll();

        return $this->render('paragraphe/index.html.twig', [
            'paragraphes' => $paragrapheRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="paragraphe_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $paragraphe = new Paragraphe();
        $form = $this->createForm(ParagrapheType::class, $paragraphe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($paragraphe);
            $entityManager->flush();

            return $this->redirectToRoute('paragraphe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('paragraphe/new.html.twig', [
            'paragraphe' => $paragraphe,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{paragrapheid}", name="paragraphe_show", methods={"GET"})
     */
    public function show(Paragraphe $paragraphe): Response
    {
        return $this->render('paragraphe/show.html.twig', [
            'paragraphe' => $paragraphe,
        ]);
    }

    /**
     * @Route("/{paragrapheid}/edit", name="paragraphe_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Paragraphe $paragraphe): Response
    {
        $form = $this->createForm(ParagrapheType::class, $paragraphe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('paragraphe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('paragraphe/edit.html.twig', [
            'paragraphe' => $paragraphe,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{paragrapheid}", name="paragraphe_delete", methods={"POST"})
     */
    public function delete(Request $request, Paragraphe $paragraphe): Response
    {
        if ($this->isCsrfTokenValid('delete'.$paragraphe->getParagrapheid(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($paragraphe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('paragraphe_index', [], Response::HTTP_SEE_OTHER);
    }
}
