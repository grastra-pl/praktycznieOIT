<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\GameRepository;

class GameController extends AbstractController
{
    #[Route('/games', name: 'app_games', methods: ['GET'])]
    public function getAll(GameRepository $gameRepository): Response
    {
        $res = $gameRepository->findAll();

        return $this->json($res);
    }

    #[Route('/games/{slug}', name: 'app_games', methods: ['GET'])]
    public function getById(int $slug, GameRepository $gameRepository): Response
    {
        $res = $gameRepository->findById($slug);

        return $this->json($res);
    }

}