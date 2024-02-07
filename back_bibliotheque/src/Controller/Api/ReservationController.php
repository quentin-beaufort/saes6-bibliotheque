<?php

namespace App\Controller\Api;

use App\Entity\Reservation;
use App\Repository\AdherentRepository;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Json;

class ReservationController extends AbstractController
{
    /*
    #[Route('/api/reservations/{id}', methods: ['GET'])]
    public function index(ReservationRepository $reservationRepository, $id): JsonResponse
    {
        $reservations = $reservationRepository->findBy(['adherent' => $id]);
        return $this->json($reservations);
    }
    */

    /*
    #[Route('/api/reservation/{id}', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $entityManagerInterface, AdherentRepository $adherentRepository, $id): JsonResponse
    {
        $reservation = new Reservation();

        $data = json_decode($request->getContent(), true);
        $reservation->setAdherent($adherentRepository->find($id));
        $reservation->setLivre($data['livre']);
        $reservation->setDateResa(new \DateTime());


        return $this->json($reservation, JsonResponse::HTTP_CREATED);
    }
    */

    /*
    #[Route('/api/reservation/{id}', methods: ['DELETE'])]
    public function delete(ReservationRepository $reservationRepository, $id): JsonResponse
    {
        $reservation = $reservationRepository->find($id);
        $reservationRepository->remove($reservation);

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }
    */
}
