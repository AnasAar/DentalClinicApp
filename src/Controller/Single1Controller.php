<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Single1Controller extends AbstractController
{
    /**
     * @Route("/single1", name="single1")
     */
    public function index()
    {
        return $this->render('single1/index.html.twig', [
            'controller_name' => 'Single1Controller',
        ]);
    }
}
