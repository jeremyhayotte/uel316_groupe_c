<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Actualite;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ActualiteController extends AbstractController
{
    #[Route('/actualite/{slug}', name: 'actualite_show')]
    public function show(?Actualite $actualite): Response
    {
        if(!$actualite) {
            return $this->redirectToRoute('app_home');
        }
        return $this->render('actualite/show.html.twig', [
            'actualite' => $actualite,
        ]);
    }
}
