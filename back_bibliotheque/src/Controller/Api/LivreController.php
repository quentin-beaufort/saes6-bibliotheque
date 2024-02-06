<?php

namespace App\Controller\Api;

use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class LivreController extends AbstractController
{
    #[Route('/api/livres', methods: ['GET'])]
    public function index(LivreRepository $livreRepository): JsonResponse
    {
        $livres = $livreRepository->findAll();
        return $this->json($livres);
    }

    #[Route('/api/livre/{id}', methods: ['GET'])]
    public function show(LivreRepository $livreRepository, int $id): JsonResponse
    {
        $livre = $livreRepository->find($id);
        return $this->json($livre);
    }
}
