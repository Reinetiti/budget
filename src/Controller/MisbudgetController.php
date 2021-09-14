<?php

namespace App\Controller;

use App\Entity\Misbudget;
use App\Form\MisbudgetType;
use App\Repository\MisbudgetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/misbudget")
 */
class MisbudgetController extends AbstractController
{
    /**
     * @Route("/", name="misbudget_index", methods={"GET"})
     */
    public function index(MisbudgetRepository $misbudgetRepository): Response
    {
        // $misbudgets = $this->getDoctrine()
        //     ->getRepository(Misbudget::class)
        //     ->findAll();

        return $this->render('misbudget/index.html.twig', [
            'misbudgets' => $misbudgetRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="misbudget_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $misbudget = new Misbudget();
        $form = $this->createForm(MisbudgetType::class, $misbudget);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($misbudget);
            $entityManager->flush();

            return $this->redirectToRoute('misbudget_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('misbudget/new.html.twig', [
            'misbudget' => $misbudget,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{misbudgetid}", name="misbudget_show", methods={"GET"})
     */
    public function show(Misbudget $misbudget): Response
    {
        return $this->render('misbudget/show.html.twig', [
            'misbudget' => $misbudget,
        ]);
    }

    /**
     * @Route("/{misbudgetid}/edit", name="misbudget_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Misbudget $misbudget): Response
    {
        $form = $this->createForm(MisbudgetType::class, $misbudget);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('misbudget_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('misbudget/edit.html.twig', [
            'misbudget' => $misbudget,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{misbudgetid}", name="misbudget_delete", methods={"POST"})
     */
    public function delete(Request $request, Misbudget $misbudget): Response
    {
        if ($this->isCsrfTokenValid('delete'.$misbudget->getMisbudgetid(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($misbudget);
            $entityManager->flush();
        }

        return $this->redirectToRoute('misbudget_index', [], Response::HTTP_SEE_OTHER);
    }
}
