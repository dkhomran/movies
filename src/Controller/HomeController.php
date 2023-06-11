<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('pages/home/Home.html.twig', [
            "firstName" => "Omran",
            "secondName" => "dekhil"
        ]);
    }


    #[Route("hello/{name}", name:'hello.sayHello')]
    public function sayHello($name) : Response {
        return $this->render('pages/home/Hello.html.twig',[
            'name' => $name
        ]);
    }


}
