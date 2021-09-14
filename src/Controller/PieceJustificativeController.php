<?php

namespace App\Controller;

use App\Entity\PieceJustificative;
use App\Form\PieceJustificativeType;
use App\Repository\PieceJustificativeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/piece/justificative")
 */
class PieceJustificativeController extends AbstractController
{
    /**
     * @Route("/", name="piece_justificative_index", methods={"GET"})
     */
    public function index(PieceJustificativeRepository $pieceJustificativeRepository): Response
    {
        // $pieceJustificatives = $this->getDoctrine()
        //     ->getRepository(PieceJustificative::class)
        //     ->findAll();

        return $this->render('piece_justificative/index.html.twig', [
            'piece_justificatives' => $pieceJustificativeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="piece_justificative_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pieceJustificative = new PieceJustificative();
        $form = $this->createForm(PieceJustificativeType::class, $pieceJustificative);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pieceJustificative);
            $entityManager->flush();

            return $this->redirectToRoute('piece_justificative_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('piece_justificative/new.html.twig', [
            'piece_justificative' => $pieceJustificative,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{idPiece}", name="piece_justificative_show", methods={"GET"})
     */
    public function show(PieceJustificative $pieceJustificative): Response
    {
        return $this->render('piece_justificative/show.html.twig', [
            'piece_justificative' => $pieceJustificative,
        ]);
    }

    /**
     * @Route("/{idPiece}/edit", name="piece_justificative_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PieceJustificative $pieceJustificative): Response
    {
        $form = $this->createForm(PieceJustificativeType::class, $pieceJustificative);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('piece_justificative_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('piece_justificative/edit.html.twig', [
            'piece_justificative' => $pieceJustificative,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{idPiece}", name="piece_justificative_delete", methods={"POST"})
     */
    public function delete(Request $request, PieceJustificative $pieceJustificative): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pieceJustificative->getIdPiece(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pieceJustificative);
            $entityManager->flush();
        }

        return $this->redirectToRoute('piece_justificative_index', [], Response::HTTP_SEE_OTHER);
    }
}
