<?php

namespace App\Controller;

use App\Entity\Engagement;
use App\Form\EngagementType;
use App\Repository\EngagementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/engagement")
 */
class EngagementController extends AbstractController
{
    /**
     * @Route("/", name="engagement_index", methods={"GET"})
     */
    public function index(EngagementRepository $engagementRepository): Response
    {
        // $engagements = $this->getDoctrine()
        //     ->getRepository(Engagement::class)
        //     ->findAll();

        return $this->render('engagement/index.html.twig', [
            'engagements' => $engagementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="engagement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $engagement = new Engagement();
        $form = $this->createForm(EngagementType::class, $engagement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($engagement);
            $entityManager->flush();

            return $this->redirectToRoute('engagement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('engagement/new.html.twig', [
            'engagement' => $engagement,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{numEngagement}", name="engagement_show", methods={"GET"})
     */
    public function show(Engagement $engagement): Response
    {
        return $this->render('engagement/show.html.twig', [
            'engagement' => $engagement,
        ]);
    }

    /**
     * @Route("/{numEngagement}/edit", name="engagement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Engagement $engagement): Response
    {
        $form = $this->createForm(EngagementType::class, $engagement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('engagement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('engagement/edit.html.twig', [
            'engagement' => $engagement,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{numEngagement}", name="engagement_delete", methods={"POST"})
     */
    public function delete(Request $request, Engagement $engagement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$engagement->getNumEngagement(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($engagement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('engagement_index', [], Response::HTTP_SEE_OTHER);
    }
}
