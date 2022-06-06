<?php

namespace App\Controller;

use App\Entity\Lignetraitement;
use App\Form\LignetraitementType;
use App\Repository\LignetraitementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lignetraitement")
 */
class LignetraitementController extends AbstractController
{
    /**
     * @Route("/", name="lignetraitement_index", methods={"GET"})
     */
    public function index(LignetraitementRepository $lignetraitementRepository): Response
    {
        return $this->render('lignetraitement/index.html.twig', [
            'lignetraitements' => $lignetraitementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="lignetraitement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lignetraitement = new Lignetraitement();
        $form = $this->createForm(LignetraitementType::class, $lignetraitement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lignetraitement);
            $entityManager->flush();

            return $this->redirectToRoute('lignetraitement_index');
        }

        return $this->render('lignetraitement/new.html.twig', [
            'lignetraitement' => $lignetraitement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lignetraitement_show", methods={"GET"})
     */
    public function show(Lignetraitement $lignetraitement): Response
    {
        return $this->render('lignetraitement/show.html.twig', [
            'lignetraitement' => $lignetraitement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="lignetraitement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Lignetraitement $lignetraitement): Response
    {
        $form = $this->createForm(LignetraitementType::class, $lignetraitement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lignetraitement_index');
        }

        return $this->render('lignetraitement/edit.html.twig', [
            'lignetraitement' => $lignetraitement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lignetraitement_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Lignetraitement $lignetraitement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lignetraitement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lignetraitement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lignetraitement_index');
    }
}
