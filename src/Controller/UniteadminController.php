<?php

namespace App\Controller;

use App\Entity\Uniteadmin;
use App\Form\UniteadminType;
use App\Repository\UniteadminRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/uniteadmin")
 */
class UniteadminController extends AbstractController
{
    /**
     * @Route("/", name="uniteadmin_index", methods={"GET"})
     */
    public function index(UniteadminRepository $uniteadminRepository): Response
    {
        // $uniteadmins = $this->getDoctrine()
        //     ->getRepository(Uniteadmin::class)
        //     ->findAll();

        return $this->render('uniteadmin/index.html.twig', [
            'uniteadmins' => $uniteadminRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="uniteadmin_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $uniteadmin = new Uniteadmin();
        $form = $this->createForm(UniteadminType::class, $uniteadmin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($uniteadmin);
            $entityManager->flush();

            return $this->redirectToRoute('uniteadmin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('uniteadmin/new.html.twig', [
            'uniteadmin' => $uniteadmin,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{uniteid}", name="uniteadmin_show", methods={"GET"})
     */
    public function show(Uniteadmin $uniteadmin): Response
    {
        return $this->render('uniteadmin/show.html.twig', [
            'uniteadmin' => $uniteadmin,
        ]);
    }

    /**
     * @Route("/{uniteid}/edit", name="uniteadmin_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Uniteadmin $uniteadmin): Response
    {
        $form = $this->createForm(UniteadminType::class, $uniteadmin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('uniteadmin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('uniteadmin/edit.html.twig', [
            'uniteadmin' => $uniteadmin,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{uniteid}", name="uniteadmin_delete", methods={"POST"})
     */
    public function delete(Request $request, Uniteadmin $uniteadmin): Response
    {
        if ($this->isCsrfTokenValid('delete'.$uniteadmin->getUniteid(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($uniteadmin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('uniteadmin_index', [], Response::HTTP_SEE_OTHER);
    }
}
