<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class ActualiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actualite::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('titre');

        yield SlugField::new('slug')->setTargetFieldName('titre');

        yield TextField::new('auteur');

        yield TextEditorField::new('contenu');

        /*yield DateTimeField::new('createdAt')
            ->hideOnForm();

        yield DateTimeField::new('updatedAt')
            ->hideOnForm();*/
    }
}
