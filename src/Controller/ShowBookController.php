<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ShowBookController extends AbstractController
{
    #[Route('/show/book', name: 'app_show_book')]
    public function index(): Response
    {
        return $this->render('show_book/index.html.twig', [
            'controller_name' => 'ShowBookController',
        ]);
    }


    
    public function showBook(): Response
    {
        $book = $this->getDoctrine()
            ->getRepository(Book::class)
            ->find(1);

        if (!$book) {
            throw $this->createNotFoundException(
                'No book found for id 1'
            );
        }

        return new Response('Check out this great book: '.$book->getTitle());
    }
}
