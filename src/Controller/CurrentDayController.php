<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CurrentDayController extends AbstractController
{
    #[Route('/currentDay', name: 'app_current_day', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('current_day/index.html.twig', [
            'controller_name' => 'TestController',
            'date_time' => getdate(),
        ]);
    }

    #[Route('/currentDayJson', name: 'app_current_day_json', methods: ['GET'])]
    public function indexJson(): Response
    {
        return $this->json(getdate());
    }
}