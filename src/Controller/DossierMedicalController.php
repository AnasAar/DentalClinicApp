<?php

namespace App\Controller;

use App\Entity\DossierMedical;
use App\Form\DossierMedicalType;
use App\Repository\DossierMedicalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dossier/medical")
 */
class DossierMedicalController extends AbstractController
{
    /**
     * @Route("/", name="dossier_medical_index", methods={"GET"})
     */
    public function index(DossierMedicalRepository $dossierMedicalRepository): Response
    {
        return $this->render('dossier_medical/index.html.twig', [
            'dossier_medicals' => $dossierMedicalRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="dossier_medical_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $dossierMedical = new DossierMedical();
        $form = $this->createForm(DossierMedicalType::class, $dossierMedical);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dossierMedical);
            $entityManager->flush();

            return $this->redirectToRoute('dossier_medical_index');
        }

        return $this->render('dossier_medical/new.html.twig', [
            'dossier_medical' => $dossierMedical,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dossier_medical_show", methods={"GET"})
     */
    public function show(DossierMedical $dossierMedical): Response
    {
        return $this->render('dossier_medical/show.html.twig', [
            'dossier_medical' => $dossierMedical,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="dossier_medical_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DossierMedical $dossierMedical): Response
    {
        $form = $this->createForm(DossierMedicalType::class, $dossierMedical);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dossier_medical_index');
        }

        return $this->render('dossier_medical/edit.html.twig', [
            'dossier_medical' => $dossierMedical,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dossier_medical_delete", methods={"DELETE"})
     */
    public function delete(Request $request, DossierMedical $dossierMedical): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dossierMedical->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dossierMedical);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dossier_medical_index');
    }
}
