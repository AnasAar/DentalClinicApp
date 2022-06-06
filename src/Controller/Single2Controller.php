<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Single2Controller extends AbstractController
{
    /**
     * @Route("/single2", name="single2")
     */
    public function index()
    {
        return $this->render('single2/index.html.twig', [
            'controller_name' => 'Single2Controller',
        ]);
    }
}
