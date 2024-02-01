<?php

namespace App\Controller;

use App\Repository\ExerciceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\MuscleRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(MuscleRepository $muscleRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'muscles' => $muscleRepository->findAll(),
                ]);
    }
}
