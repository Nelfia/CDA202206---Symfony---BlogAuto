<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Repository\AnnonceRepository;
use App\Repository\MarqueRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(AnnonceRepository $annonceRepository, UserRepository $userRepository, MarqueRepository $marqueRepository): Response
    {
        return $this->render('main/index.html.twig', [
            "annonces" => $annonceRepository->findAll(),
            "roles" => $userRepository->findAll(),
            "marques" => $marqueRepository->findAll()
        ]);
    }

    #[Route('/card/{id}', name: 'marque', methods: ['GET'])]
    public function marque(Marque $marque, AnnonceRepository $annonceRepository): Response
    {
        return $this->render('main/marque.html.twig', [
            "marque" => $marque,
            "annonces" => $annonceRepository->findAll()
        ]);
    }
}
