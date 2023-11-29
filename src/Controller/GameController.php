<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\GameRepository;

class GameController extends AbstractController
{
    #[Route('/allGames', name: 'app_games', methods: ['GET'])]
    public function getAll(GameRepository $gameRepository): Response
    {
        $res = $gameRepository->findAll();

        return $this->json($res);
    }

    #[Route('/games/{id}', name: 'app_games_by_id', methods: ['GET'])]
    public function getById(int $id, GameRepository $gameRepository): Response
    {
        $res = $gameRepository->findById($id);

        return $this->json($res);
    }
}