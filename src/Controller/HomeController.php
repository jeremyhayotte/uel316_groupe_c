<?php

namespace App\Controller;

use App\Repository\ActualiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ActualiteRepository $actualiteRepo): Response
    {
        return $this->render('home/index.html.twig', [
            'actualites' => $actualiteRepo->findAll()
        ]);
    }
}
