<?php

namespace App\Controller;

use App\Entity\Typebudget;
use App\Form\TypebudgetType;
use App\Repository\TypebudgetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/typebudget")
 */
class TypebudgetController extends AbstractController
{
    /**
     * @Route("/", name="typebudget_index", methods={"GET"})
     */
    public function index(TypebudgetRepository $typebudgetRepository): Response
    {
        // $typebudgets = $this->getDoctrine()
        //     ->getRepository(Typebudget::class)
        //     ->findAll();

        return $this->render('typebudget/index.html.twig', [
            'typebudgets' => $typebudgetRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="typebudget_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typebudget = new Typebudget();
        $form = $this->createForm(TypebudgetType::class, $typebudget);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typebudget);
            $entityManager->flush();

            return $this->redirectToRoute('typebudget_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('typebudget/new.html.twig', [
            'typebudget' => $typebudget,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{typebudgetid}", name="typebudget_show", methods={"GET"})
     */
    public function show(Typebudget $typebudget): Response
    {
        return $this->render('typebudget/show.html.twig', [
            'typebudget' => $typebudget,
        ]);
    }

    /**
     * @Route("/{typebudgetid}/edit", name="typebudget_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Typebudget $typebudget): Response
    {
        $form = $this->createForm(TypebudgetType::class, $typebudget);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typebudget_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('typebudget/edit.html.twig', [
            'typebudget' => $typebudget,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{typebudgetid}", name="typebudget_delete", methods={"POST"})
     */
    public function delete(Request $request, Typebudget $typebudget): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typebudget->getTypebudgetid(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typebudget);
            $entityManager->flush();
        }

        return $this->redirectToRoute('typebudget_index', [], Response::HTTP_SEE_OTHER);
    }
}
