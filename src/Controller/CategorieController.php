<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    #[Route('/categorie/{slug}', name: 'category_show')]
    public function shox(): Response
    {
        return $this->render('categorie/show.html.twig', [
            'controller_name' => 'CategorieController',
        ]);
    }
}
