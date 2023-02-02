<?php
// src/Controller/IndexController.php
namespace App\Controller;

use App\Entity\Realisation;
use App\Entity\Message;
use App\Entity\User;
use App\Repository\RealisationRepository;
use App\Repository\MessageRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_index', methods: ['GET'])]
    public function index(RealisationRepository $realisationRepository): Response
    {
        return $this->render('index.html.twig', [
            'realisation' => $realisationRepository->findAll(),
        ]);
    }
}
