<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\RailwayConnectionRepository;

class RailwayConnectionController extends AbstractController
{
    #[Route('/', name: 'app_railway_search')]
    public function index(): Response
    {
        return $this->render('railway_connection/search.html.twig');
    }

    #[Route('/api/search', name: 'app_api_railway_search')]
    public function searchApi(Request $request, RailwayConnectionRepository $railwayConnectionRepository): Response
    {
        //TODO dodać weryfikację, czy wszystkie pola zostały wysłane. Route nie powinien wykonać wyszukiwania, bez wszystkich pól od użytkownika.

        $initial_station = $request->query->get("initial_station");
        $destination_station = $request->query->get("destination_station");
        $date_of_travel = $request->query->get("date_of_travel");

        $results = $railwayConnectionRepository->findSearchResults($initial_station, $destination_station, $date_of_travel);
        return $this->json($results);
    }


    #[Route('/connection/{id}', name: 'app_railway_connection')]
    public function connectionPage($id, RailwayConnectionRepository $railwayConnectionRepository): Response
    {
        //TODO findById() na ten moment nie istnieje. Zrobić.
        //TODO jeżeli połączenie z danym ID nie istnieje, kontroler powinien zwrócić właściwą wiadomość do użytkownika. 
        return $this->render('railway_connection/view_connection.html.twig', [
            'connection_data' => $railwayConnectionRepository->findById($id),
        ]);
    }
}
