<?php

namespace App\Controller;

use App\Entity\Actualite;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categorie;

class CategorieController extends AbstractController
{
    #[Route('/categorie/{slug}', name: 'categorie_show')]
    public function show(?Categorie $categorie): Response
    {
        if (!$categorie) {
            return $this->redirectToRoute('app_home');
        }
        return $this->render('categorie/show.html.twig', [
            'categorie' => $categorie,
        ]);
    }
}
