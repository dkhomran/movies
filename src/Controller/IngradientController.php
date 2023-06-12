<?php

namespace App\Controller;

use App\Repository\IngredientRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IngradientController extends AbstractController
{


    /**
     * This function display All ingredients
     *
     * @param IngredientRepository $repo
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return void
     */

    #[Route('/ingradient', name: 'app_ingradient')]
    public function listAction(IngredientRepository $repo, PaginatorInterface $paginator, Request $request)
    {
        $ingredients = $paginator->paginate(
            $query = $repo->findAll(),/* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        // parameters to template
        return $this->render('pages/ingradient/ingradient.html.twig', [
            'ingredients' => $ingredients
        ]);
    }
}
