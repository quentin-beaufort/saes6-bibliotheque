<?php

namespace App\Controller\Api;

use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends AbstractController
{
    #[Route('/api/search', name: 'app_api_search')]
    public function index(Request $request, LivreRepository $livreRepository): JsonResponse
    {
        $searchwords = $request->query->get('searchwords');
        $category = $request->query->get('category');
        $author = $request->query->get('author');
        $language = $request->query->get('language');
        $minYear = $request->query->get('minYear');
        $maxYear = $request->query->get('maxYear');

        $data = $livreRepository->searchByComplex($searchwords, $category, $author, $language, $minYear, $maxYear);

        return $this->json($data);
    }
}
