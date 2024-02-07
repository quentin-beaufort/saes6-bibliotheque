<?php

namespace App\Controller\Api;

use App\Repository\AdherentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Adherent;


class AdherentController extends AbstractController
{
    /*
    #[Route('/api/adherents', methods: ['GET'])]
    public function index(AdherentRepository $adherentRepository): JsonResponse
    {
        $adherents = $adherentRepository->findAll();
        return $this->json($adherents);
    }
    */

    /*
    #[Route('/api/adherent/{id}', methods: ['GET'])]
    public function show(AdherentRepository $adherentRepository, int $id): JsonResponse
    {
        $adherent = $adherentRepository->find($id);
        return $this->json($adherent);
    }
    */

    /*
    #[Route('/api/adherent/{id}', methods: ['PUT'])]
    public function update(Request $request, EntityManagerInterface $entityManager, AdherentRepository $adherentRepository, int $id): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        //nom, prenom, email, tel, photo
        $adherent = $adherentRepository->find($id);
        $adherent->setNom($data['nom']);
        $adherent->setPrenom($data['prenom']);
        $adherent->setEmail($data['email']);
        $adherent->setNumTel($data['tel']);
        $adherent->setPhoto($data['photo']);

        $entityManager->persist($adherent);
        $entityManager->flush();

        return $this->json($adherent, JsonResponse::HTTP_CREATED);
    }
    */
}
