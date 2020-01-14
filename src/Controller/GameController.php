<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Game;

class GameController extends AbstractController
{
    /**
     * @Route("/", name="game")
     */
    public function index()
    {
        $games = $this->getDoctrine()
        ->getRepository(Game::class)
        ->findAll();

        return $this->render('game/index.html.twig', [
            'games' => $games,
        ]);
    }
}
