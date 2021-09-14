<?php

namespace App\Controller;

use App\Entity\Misetat;
use App\Form\MisetatType;
use App\Repository\MisetatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/misetat")
 */
class MisetatController extends AbstractController
{
    /**
     * @Route("/", name="misetat_index", methods={"GET"})
     */
    public function index(MisetatRepository $misetatRepository): Response
    {
        // $misetats = $this->getDoctrine()
        //     ->getRepository(Misetat::class)
        //     ->findAll();

        return $this->render('misetat/index.html.twig', [
            'misetats' => $misetatRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="misetat_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $misetat = new Misetat();
        $form = $this->createForm(MisetatType::class, $misetat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($misetat);
            $entityManager->flush();

            return $this->redirectToRoute('misetat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('misetat/new.html.twig', [
            'misetat' => $misetat,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{misetatid}", name="misetat_show", methods={"GET"})
     */
    public function show(Misetat $misetat): Response
    {
        return $this->render('misetat/show.html.twig', [
            'misetat' => $misetat,
        ]);
    }

    /**
     * @Route("/{misetatid}/edit", name="misetat_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Misetat $misetat): Response
    {
        $form = $this->createForm(MisetatType::class, $misetat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('misetat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('misetat/edit.html.twig', [
            'misetat' => $misetat,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{misetatid}", name="misetat_delete", methods={"POST"})
     */
    public function delete(Request $request, Misetat $misetat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$misetat->getMisetatid(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($misetat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('misetat_index', [], Response::HTTP_SEE_OTHER);
    }
}
