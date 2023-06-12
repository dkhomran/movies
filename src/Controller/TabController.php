<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TabController extends AbstractController
{
    #[Route('/tab', name: 'app_tab')]
    public function index(): Response
    {

        $tab = [
            [
                "lastName" => "Dekhil",
                "firstName" => "Omran",
                "age" => 22
            ],
            [
                "lastName" => "Smati",
                "firstName" => "Amine",
                "age" => 25
            ],
            [
                "lastName" => "fradi",
                "firstName" => "Sayf",
                "age" => 11
            ],
            [
                "lastName" => "Kharoubi",
                "firstName" => "maher",
                "age" => 45
            ]
        ];

        return $this->render('pages/tab/index.html.twig', [
            "tab" => $tab
        ]);
    }
}
