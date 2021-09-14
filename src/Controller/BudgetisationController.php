<?php

namespace App\Controller;

use App\Entity\Budgetisation;
use App\Form\BudgetisationType;
use App\Repository\BudgetisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/budgetisation")
 */
class BudgetisationController extends AbstractController
{
    /**
     * @Route("/", name="budgetisation_index", methods={"GET"})
     */
    public function index(BudgetisationRepository $budgetisationRepository): Response
    {
        // $budgetisations = $this->getDoctrine()
        //     ->getRepository(Budgetisation::class)
        //     ->findAll();

        return $this->render('budgetisation/index.html.twig', [
            'budgetisations' => $budgetisationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="budgetisation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $budgetisation = new Budgetisation();
        $form = $this->createForm(BudgetisationType::class, $budgetisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($budgetisation);
            $entityManager->flush();

            return $this->redirectToRoute('budgetisation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('budgetisation/new.html.twig', [
            'budgetisation' => $budgetisation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="budgetisation_show", methods={"GET"})
     */
    public function show(Budgetisation $budgetisation): Response
    {
        return $this->render('budgetisation/show.html.twig', [
            'budgetisation' => $budgetisation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="budgetisation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Budgetisation $budgetisation): Response
    {
        $form = $this->createForm(BudgetisationType::class, $budgetisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('budgetisation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('budgetisation/edit.html.twig', [
            'budgetisation' => $budgetisation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="budgetisation_delete", methods={"POST"})
     */
    public function delete(Request $request, Budgetisation $budgetisation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$budgetisation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($budgetisation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('budgetisation_index', [], Response::HTTP_SEE_OTHER);
    }
}
