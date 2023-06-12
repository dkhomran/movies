<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends AbstractController
{
    #[Route("/session", name:'session')]
    public  function index(Request $request): Response {


        $session = $request->getSession();

        if ($session->has("nbrVisite")) {
            $nbr = $session->get("nbrVisite");
        }else {
            $nbr = 0;
        }
        $nbr++;
        $session->set("nbrVisite",$nbr);




        return $this->render("pages/session/index.html.twig");
    }

}
