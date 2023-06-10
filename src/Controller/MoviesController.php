<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    #[Route('/movies', name: 'app_movies')]
    public function index(): Response
    {
        return $this->render('movies/index.html.twig', [
            'controller_name' => 'omran',
        ]);
    }



    #[Route("/old", name: "old.oldMethod", methods: "GET")]
    public function oldMethod(): Response
    {
        return $this->render('movies/index.html.twig', [
            'controller_name' => 'Old Method = omran',
        ]);
    }
}
