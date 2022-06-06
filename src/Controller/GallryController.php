<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GallryController extends AbstractController
{
    /**
     * @Route("/gallry", name="gallry")
     */
    public function index()
    {
        return $this->render('gallry/index.html.twig', [
            'controller_name' => 'GallryController',
        ]);
    }
}
