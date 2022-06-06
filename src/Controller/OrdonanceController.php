<?php

namespace App\Controller;

use App\Entity\Ordonance;
use App\Form\OrdonanceType;
use App\Repository\OrdonanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ordonance")
 */
class OrdonanceController extends AbstractController
{
    /**
     * @Route("/", name="ordonance_index", methods={"GET"})
     */
    public function index(OrdonanceRepository $ordonanceRepository): Response
    {
        return $this->render('ordonance/index.html.twig', [
            'ordonances' => $ordonanceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ordonance_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ordonance = new Ordonance();
        $form = $this->createForm(OrdonanceType::class, $ordonance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ordonance);
            $entityManager->flush();

            return $this->redirectToRoute('ordonance_index');
        }

        return $this->render('ordonance/new.html.twig', [
            'ordonance' => $ordonance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ordonance_show", methods={"GET"})
     */
    public function show(Ordonance $ordonance): Response
    {
        return $this->render('ordonance/show.html.twig', [
            'ordonance' => $ordonance,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ordonance_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ordonance $ordonance): Response
    {
        $form = $this->createForm(OrdonanceType::class, $ordonance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ordonance_index');
        }

        return $this->render('ordonance/edit.html.twig', [
            'ordonance' => $ordonance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ordonance_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ordonance $ordonance): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ordonance->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ordonance);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ordonance_index');
    }
}
