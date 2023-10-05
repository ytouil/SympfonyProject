<?php

namespace App\Controller;

use App\Repository\InventoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InventoryController extends AbstractController
{
    private $inventoryRepository;

    public function __construct(InventoryRepository $inventoryRepository)
    {
        $this->inventoryRepository = $inventoryRepository;
    }

    #[Route('/inventory', name: 'app_inventory')]
    public function index(): Response
    {
        $inventories = $this->inventoryRepository->findAll();

        return $this->render('inventory/index.html.twig', [
            'inventories' => $inventories,
        ]);
    }
}
