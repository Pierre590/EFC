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
    public function index(Request $request, PaginatorInterface $paginator)
    {
        $games = $this->getDoctrine()
        ->getRepository(Game::class)
        ->findBY([],['name'=>'ASC']);

        $gamesTest = $paginator->paginate(
        $games, // Requête contenant les données à paginer (ici nos articles)
        $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
        20); // Nombre de résultats par page

        return $this->render('game/index.html.twig', [
            'gamesTest' => $gamesTest,
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
