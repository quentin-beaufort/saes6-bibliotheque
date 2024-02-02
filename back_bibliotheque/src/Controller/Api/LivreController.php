<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\LivreRepository;

class LivreController extends AbstractController
{
    #[Route('/api/livre', name: 'app_api_livre')]
    public function index(LivreRepository $livreRepository): JsonResponse
    {
        $livres = $livreRepository->findAllAsArray();
        return $this->json($livres);
    }


    #[Route('/api/troislivre', name: 'app_api_livre')]
    public function index2(LivreRepository $livreRepository): JsonResponse
    {
        $tab  = [];
        $livres = $livreRepository->findAllAsArray();
        for($i=0;$i<3;$i++){
            $tab[$i]=$livres[$i];
        }
        return $this->json($tab);
    }
}
