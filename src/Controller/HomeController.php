<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_')]
class HomeController extends AbstractController
{

    #[Route('/', name: 'home')]
    public function index(CallApiService $callApiService): Response
    {
        // dd($callApiService->getNameData());
        return $this->render('home/index.html.twig', [
            'data' => $callApiService->getNameData(),
            'commune' => $callApiService->getCommuneData(),
            'departements' => $callApiService->getDepartementData(),
        ]);
    }

    #[Route('/commune', name: 'commune')]
    public function Commune(CallApiService $callApiService): Response
    {
        // dd($callApiService->getCommuneData());
        return $this->render('home/commune.html.twig', [
            'data' => $callApiService->getCommuneData(),
            'departements' => $callApiService->getDepartementData(),
        ]);
    }

    #[Route('/departement', name: 'departement')]
    public function Departement(CallApiService $callApiService): Response
    {
        // dd($callApiService->getDepartementData());
        return $this->render('home/departement.html.twig', [
            'departements' => $callApiService->getDepartementData(),
        ]);
    }
}
