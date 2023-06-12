<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RandomTableController extends AbstractController
{
    #[Route('/random/table/{nb}', name: 'app_random_table')]
    public  function index($nb) : Response {
        for ($i =  0; $i < $nb; $i++ ) {
            $table[] = rand(0,150);
        }

        return $this->render("random_table/index.html.twig", [
            'table' => $table
        ]);
    }
}
