<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Game;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

class GameController extends AbstractController
{
    /**
     * @Route("/", name="games")
     */
    public function index()
    {
        $games = $this->getDoctrine()
        ->getRepository(Game::class)
        ->findBY([],['name'=>'ASC']);

        return $this->render('game/index.html.twig', [
            'games' => $games,
        ]);
    }
    /**
     * @Route("/game/{id}", name="game")
     */
    public function game($id)
    {
        $game = $this->getDoctrine()
        ->getRepository(Game::class)
        ->find($id);



        return $this->render('game/game.html.twig', [
            'game' => $game,
        ]);
    }

}
