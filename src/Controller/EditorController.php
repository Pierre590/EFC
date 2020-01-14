<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Game;


class EditorController extends AbstractController
{
    /**
     * @Route("/editor", name="editor")
     */
    public function index()
    {
        $games = $this->getDoctrine()
        ->getRepository(Game::class)
        ->findAll();

        return $this->render('editor/index.html.twig', [
            'games' => $games,
        ]);
    }
}
