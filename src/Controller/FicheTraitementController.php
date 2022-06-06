<?php

namespace App\Controller;

use App\Entity\FicheTraitement;
use App\Form\FicheTraitementType;
use App\Repository\FicheTraitementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fiche/traitement")
 */
class FicheTraitementController extends AbstractController
{
    /**
     * @Route("/", name="fiche_traitement_index", methods={"GET"})
     */
    public function index(FicheTraitementRepository $ficheTraitementRepository): Response
    {
        return $this->render('fiche_traitement/index.html.twig', [
            'fiche_traitements' => $ficheTraitementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="fiche_traitement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ficheTraitement = new FicheTraitement();
        $form = $this->createForm(FicheTraitementType::class, $ficheTraitement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ficheTraitement);
            $entityManager->flush();

            return $this->redirectToRoute('fiche_traitement_index');
        }

        return $this->render('fiche_traitement/new.html.twig', [
            'fiche_traitement' => $ficheTraitement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fiche_traitement_show", methods={"GET"})
     */
    public function show(FicheTraitement $ficheTraitement): Response
    {
        return $this->render('fiche_traitement/show.html.twig', [
            'fiche_traitement' => $ficheTraitement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fiche_traitement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FicheTraitement $ficheTraitement): Response
    {
        $form = $this->createForm(FicheTraitementType::class, $ficheTraitement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fiche_traitement_index');
        }

        return $this->render('fiche_traitement/edit.html.twig', [
            'fiche_traitement' => $ficheTraitement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fiche_traitement_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FicheTraitement $ficheTraitement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ficheTraitement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ficheTraitement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fiche_traitement_index');
    }
}
