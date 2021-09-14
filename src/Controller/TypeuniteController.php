<?php

namespace App\Controller;

use App\Entity\Typeunite;
use App\Form\TypeuniteType;
use App\Repository\TypeuniteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/typeunite")
 */
class TypeuniteController extends AbstractController
{
    /**
     * @Route("/", name="typeunite_index", methods={"GET"})
     */
    public function index(TypeuniteRepository $typeuniteRepository): Response
    {
        // $typeunites = $this->getDoctrine()
        //     ->getRepository(Typeunite::class)
        //     ->findAll();

        return $this->render('typeunite/index.html.twig', [
            'typeunites' => $typeuniteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="typeunite_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeunite = new Typeunite();
        $form = $this->createForm(TypeuniteType::class, $typeunite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeunite);
            $entityManager->flush();

            return $this->redirectToRoute('typeunite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('typeunite/new.html.twig', [
            'typeunite' => $typeunite,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{typeid}", name="typeunite_show", methods={"GET"})
     */
    public function show(Typeunite $typeunite): Response
    {
        return $this->render('typeunite/show.html.twig', [
            'typeunite' => $typeunite,
        ]);
    }

    /**
     * @Route("/{typeid}/edit", name="typeunite_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Typeunite $typeunite): Response
    {
        $form = $this->createForm(TypeuniteType::class, $typeunite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typeunite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('typeunite/edit.html.twig', [
            'typeunite' => $typeunite,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{typeid}", name="typeunite_delete", methods={"POST"})
     */
    public function delete(Request $request, Typeunite $typeunite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeunite->getTypeid(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeunite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('typeunite_index', [], Response::HTTP_SEE_OTHER);
    }
}
