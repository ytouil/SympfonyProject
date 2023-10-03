<?php

namespace App\Controller\Admin;

use App\Entity\Inventory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field;

class InventoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Inventory::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field\IdField::new('id')->onlyOnIndex(),
            Field\TextField::new('name'),
            Field\AssociationField::new('user'),
            Field\CollectionField::new('guitars')->onlyOnIndex(),
        ];
    }
}
