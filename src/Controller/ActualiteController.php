<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActualiteController extends AbstractController
{
    #[Route('/actualite/{slug}', name: 'actuality_show')]
    public function show(): Response
    {
        return $this->render('actualite/show.html.twig', [
            'controller_name' => 'ActualiteController',
        ]);
    }
}
