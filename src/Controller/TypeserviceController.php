<?php

namespace App\Controller;

use App\Entity\Typeservice;
use App\Form\TypeserviceType;
use App\Repository\TypeserviceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/typeservice")
 */
class TypeserviceController extends AbstractController
{
    /**
     * @Route("/", name="typeservice_index", methods={"GET"})
     */
    public function index(TypeserviceRepository $typeserviceRepository): Response
    {
        // $typeservices = $this->getDoctrine()
        //     ->getRepository(Typeservice::class)
        //     ->findAll();

        return $this->render('typeservice/index.html.twig', [
            'typeservices' => $typeserviceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="typeservice_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeservice = new Typeservice();
        $form = $this->createForm(TypeserviceType::class, $typeservice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeservice);
            $entityManager->flush();

            return $this->redirectToRoute('typeservice_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('typeservice/new.html.twig', [
            'typeservice' => $typeservice,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{serviceid}", name="typeservice_show", methods={"GET"})
     */
    public function show(Typeservice $typeservice): Response
    {
        return $this->render('typeservice/show.html.twig', [
            'typeservice' => $typeservice,
        ]);
    }

    /**
     * @Route("/{serviceid}/edit", name="typeservice_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Typeservice $typeservice): Response
    {
        $form = $this->createForm(TypeserviceType::class, $typeservice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typeservice_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('typeservice/edit.html.twig', [
            'typeservice' => $typeservice,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{serviceid}", name="typeservice_delete", methods={"POST"})
     */
    public function delete(Request $request, Typeservice $typeservice): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeservice->getServiceid(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeservice);
            $entityManager->flush();
        }

        return $this->redirectToRoute('typeservice_index', [], Response::HTTP_SEE_OTHER);
    }
}
