<?php

namespace App\Controller;

use App\Entity\Typepgram;
use App\Form\TypepgramType;
use App\Repository\TypepgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/typepgram")
 */
class TypepgramController extends AbstractController
{
    /**
     * @Route("/", name="typepgram_index", methods={"GET"})
     */
    public function index(TypepgramRepository $typepgramRepository): Response
    {
        // $typepgrams = $this->getDoctrine()
        //     ->getRepository(Typepgram::class)
        //     ->findAll();

        return $this->render('typepgram/index.html.twig', [
            'typepgrams' => $typepgramRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="typepgram_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typepgram = new Typepgram();
        $form = $this->createForm(TypepgramType::class, $typepgram);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typepgram);
            $entityManager->flush();

            return $this->redirectToRoute('typepgram_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('typepgram/new.html.twig', [
            'typepgram' => $typepgram,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{typepgramid}", name="typepgram_show", methods={"GET"})
     */
    public function show(Typepgram $typepgram): Response
    {
        return $this->render('typepgram/show.html.twig', [
            'typepgram' => $typepgram,
        ]);
    }

    /**
     * @Route("/{typepgramid}/edit", name="typepgram_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Typepgram $typepgram): Response
    {
        $form = $this->createForm(TypepgramType::class, $typepgram);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typepgram_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('typepgram/edit.html.twig', [
            'typepgram' => $typepgram,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{typepgramid}", name="typepgram_delete", methods={"POST"})
     */
    public function delete(Request $request, Typepgram $typepgram): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typepgram->getTypepgramid(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typepgram);
            $entityManager->flush();
        }

        return $this->redirectToRoute('typepgram_index', [], Response::HTTP_SEE_OTHER);
    }
}
