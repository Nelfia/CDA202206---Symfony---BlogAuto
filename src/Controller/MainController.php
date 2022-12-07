<?php

namespace App\Controller;

use App\Repository\AnnonceRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(AnnonceRepository $annonceRepository, UserRepository $userRepository): Response
    {
        return $this->render('main/index.html.twig', [
            "annonces" => $annonceRepository->findAll(),
            "roles" => $userRepository->findAll()
        ]);
    }
}
