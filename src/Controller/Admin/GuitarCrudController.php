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
            Field\TextField::new('brand'),
            Field\IntegerField::new('year'),
            Field\TextareaField::new('description'),
            Field\ImageField::new('image')->onlyOnForms(),
            Field\AssociationField::new('inventory'),
        ];
    }
}

