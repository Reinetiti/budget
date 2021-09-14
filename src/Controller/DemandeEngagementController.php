<?php

namespace App\Controller;

use App\Entity\DemandeEngagement;
use App\Form\DemandeEngagementType;
use App\Repository\DemandeEngagementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/demande/engagement")
 */
class DemandeEngagementController extends AbstractController
{
    /**
     * @Route("/", name="demande_engagement_index", methods={"GET"})
     */
    public function index(DemandeEngagementRepository $demandeEngagementRepository): Response
    {
        // $demandeEngagements = $this->getDoctrine()
        //     ->getRepository(DemandeEngagement::class)
        //     ->findAll();

        return $this->render('demande_engagement/index.html.twig', [
            'demande_engagements' => $demandeEngagementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="demande_engagement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $demandeEngagement = new DemandeEngagement();
        $form = $this->createForm(DemandeEngagementType::class, $demandeEngagement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($demandeEngagement);
            $entityManager->flush();

            return $this->redirectToRoute('demande_engagement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demande_engagement/new.html.twig', [
            'demande_engagement' => $demandeEngagement,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{numDemande}", name="demande_engagement_show", methods={"GET"})
     */
    public function show(DemandeEngagement $demandeEngagement): Response
    {
        return $this->render('demande_engagement/show.html.twig', [
            'demande_engagement' => $demandeEngagementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{numDemande}/edit", name="demande_engagement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DemandeEngagement $demandeEngagement): Response
    {
        $form = $this->createForm(DemandeEngagementType::class, $demandeEngagement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demande_engagement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demande_engagement/edit.html.twig', [
            'demande_engagement' => $demandeEngagement,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{numDemande}", name="demande_engagement_delete", methods={"POST"})
     */
    public function delete(Request $request, DemandeEngagement $demandeEngagement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$demandeEngagement->getNumDemande(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($demandeEngagement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('demande_engagement_index', [], Response::HTTP_SEE_OTHER);
    }
}
