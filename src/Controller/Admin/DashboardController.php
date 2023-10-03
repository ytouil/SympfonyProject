<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Inventory;
use App\Entity\Guitar;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin_')]
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Your App Name');
    }

    public function configureMenuItems(): iterable
{
    return [
        MenuItem::linktoDashboard('Dashboard', 'fa fa-home'),
        MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
        MenuItem::linkToCrud('Inventories', 'fa fa-list', Inventory::class),
        MenuItem::linkToCrud('Guitars', 'fa fa-music', Guitar::class),
    ];
}
}
