<?php

namespace App\Controller;

use App\Entity\Catservice;
use App\Form\CatserviceType;
use App\Repository\CatserviceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/catservice")
 */
class CatserviceController extends AbstractController
{
    /**
     * @Route("/", name="catservice_index", methods={"GET"})
     */
    public function index(CatserviceRepository $catserviceRepository): Response
    {
        // $catservices = $this->getDoctrine()
        //     ->getRepository(Catservice::class)
        //     ->findAll();

        return $this->render('catservice/index.html.twig', [
            'catservices' => $catserviceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="catservice_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $catservice = new Catservice();
        $form = $this->createForm(CatserviceType::class, $catservice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($catservice);
            $entityManager->flush();

            return $this->redirectToRoute('catservice_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('catservice/new.html.twig', [
            'catservice' => $catservice,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{catid}", name="catservice_show", methods={"GET"})
     */
    public function show(Catservice $catservice): Response
    {
        return $this->render('catservice/show.html.twig', [
            'catservice' => $catservice,
        ]);
    }

    /**
     * @Route("/{catid}/edit", name="catservice_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Catservice $catservice): Response
    {
        $form = $this->createForm(CatserviceType::class, $catservice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('catservice_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('catservice/edit.html.twig', [
            'catservice' => $catservice,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{catid}", name="catservice_delete", methods={"POST"})
     */
    public function delete(Request $request, Catservice $catservice): Response
    {
        if ($this->isCsrfTokenValid('delete'.$catservice->getCatid(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($catservice);
            $entityManager->flush();
        }

        return $this->redirectToRoute('catservice_index', [], Response::HTTP_SEE_OTHER);
    }
}
