<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field\IdField::new('id')->onlyOnIndex(),
            Field\TextField::new('email'),
            Field\TextField::new('full_name', 'Full Name'),
            Field\ImageField::new('picture')->onlyOnForms(),
            Field\PasswordField::new('password'),
            Field\TextareaField::new('bio'),
            Field\AssociationField::new('inventory'),
        ];
    }
}

