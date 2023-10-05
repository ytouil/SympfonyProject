<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\GuitarRepository;
use App\Entity\Guitar;

class GuitarController extends AbstractController
{
    #[Route('/guitar', name: 'app_guitar')]
    public function index(GuitarRepository $guitarRepository): Response
    {
        $guitars = $guitarRepository->findAll();

        return $this->render('guitar/index.html.twig', [
            'guitars' => $guitars,
        ]);
    }

    #[Route('/guitars/{inventoryId}', name: 'app_guitars_list')]
    public function list(int $inventoryId, GuitarRepository $guitarRepository): Response
    {
        $guitars = $guitarRepository->findBy(['inventory' => $inventoryId]);
        
        return $this->render('guitar/list.html.twig', [
            'guitars' => $guitars,
        ]);
    }

    #[Route('/guitar/{id}', name: 'guitar_show')]
    public function show(Guitar $guitar): Response
    {
        return $this->render('guitar/show.html.twig', [
            'guitar' => $guitar,
        ]);
    }
}
