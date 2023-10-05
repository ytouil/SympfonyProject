<?php

namespace App\Controller\Admin;

use App\Entity\Guitar;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field;

class GuitarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Guitar::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field\IdField::new('id')->onlyOnIndex(),
            Field\TextField::new('modelName', 'Model Name'),
            Field\TextareaField::new('description'),
            Field\AssociationField::new('inventory'),
        ];
    }
}

