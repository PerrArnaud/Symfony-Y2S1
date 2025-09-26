<?php

namespace App\Controller;
use App\Entity\Book;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CreateBookController extends AbstractController
{
    #[Route('/create/book', name: 'app_create_book')]
    public function index(): Response
    {
        return $this->render('create_book/index.html.twig', [
            'controller_name' => 'CreateBookController',
        ]);
    }

    public function createBook(EntityManagerInterface $entityManager): Response
    {
        $book = new Book();
        $book->setTitle('It');
        
        

        $entityManager->persist($book);
        $entityManager->flush();

        return new Response('Saved new book with id '.$book->getId());
    }
}
