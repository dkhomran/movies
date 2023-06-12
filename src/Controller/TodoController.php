<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function mysql_xdevapi\getSession;

class TodoController extends AbstractController
{
        #[Route('/todo', name: 'app_todo')]
        public function index(Request $request): Response
        {
            $todo = [
                "lundi" => "learn html",
                "mardi" => "learn CSS",
                "mercredi" => "learn js"
            ];
            $session = $request->getSession();
            if(!$session->has("todo")) {
                $session->set("todo", $todo);
            }
            return $this->render('pages/todo/index.html.twig');
        }

        #[Route('/todo/add/{name}/{content}', name: 'add_todo')]
        public function addTodo(Request $request, $name,$content): Response
        {
            $session = $request->getSession();

            if($session->has('todo')) {
                $todo = $session->get('todo');
                if(isset($todo[$name])) {
                    $this->addFlash('error', 'this todo exist !');
                }else {
                    $todo[$name] = $content;
                    $session->set('todo', $todo);
                    $this->addFlash('success', 'todo added !');
                }
            }

            return $this->forward('App\Controller\TodoController::index');
        }


        #[Route('/todo/update/{name}/{content}', name: 'update_todo')]
        public function updateTodo(Request $request, $name,$content): Response
    {
        $session = $request->getSession();

        if($session->has('todo')) {
            $todo = $session->get('todo');
            if(!isset($todo[$name])) {
                $this->addFlash('error', 'this todo not exist !');
            }else {
                $todo[$name] = $content;
                $session->set('todo', $todo);
                $this->addFlash('success', 'todo updated !');

            }
        }

        return $this->forward('App\Controller\TodoController::index');
        }


        #[Route('/todo/delete/{name}', name:'todo.delete')]
        public function deleteTodo(Request $request , $name): Response {

            $session = $request->getSession();
            if($session->has('todo')) {
                $todo = $session->get('todo');
                if(isset($todo[$name])) {
                    unset($todo[$name]);
                    $session->set('todo', $todo);
                    $this->addFlash('success', 'Todo deleted !');
                }else {
                    $this->addFlash('error', 'Todo not exist !');
                }
            }

        return $this->forward('App\Controller\TodoController::index');
        }

        #[Route('todo/reset', name:'todo.reset')]
        public function resetTodo(Request $request) : Response {
            $session = $request->getSession();
            $session->remove("todo");
            $this->addFlash('success', 'todo reseted !');



            return  $this->redirectToRoute("app_todo");
         }
        }



