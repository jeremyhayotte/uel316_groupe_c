<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use App\Entity\Categorie;
use App\Entity\Commentaire;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    )
    {
    }


    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(ActualiteCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Uel16');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Aller sur le site', 'fa fa-undo', 'app_home');

        yield MenuItem::subMenu('Actualités', 'fas fa-newspaper')->setSubItems([
            MenuItem::linkToCrud('Toutes les actualités', 'fas fa-newspaper', Actualite::class),
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Actualite::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Catégories', 'fas fa-list', Categorie::class)->setAction(Crud::PAGE_NEW)
        ]);

        yield MenuItem::linkToCrud('Commentaires', 'fas fa-comment', Commentaire::class);
    }
}
